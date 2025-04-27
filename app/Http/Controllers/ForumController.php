<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class ForumController extends Controller
{
    public function index(){
        return response()->json(["data" => Forum::with(['user'])->get()]);
    }
    public function table(){
      return DataTables::of(Forum::with(['user'])->get())
        ->addColumn('author', function($forum){
            return !empty($forum->user->username) ?  $forum->user->username : 'Guest';
        })->make(true);
    }

    public function post(Request $request){
        $request->validate([
            "user" => "required",
            "name" => "required",
            "description" => "required",
            "category" => "required",
        ]);

        $user = User::where("id", $request->user)->first();
        if(!$user){
            return response()->json(['error' => 'Invalid user'], 402);
        }

        $forum = Forum::create([
            "user_id" => $request->user,
            "name" => $request->name,
            "description" => $request->description,
            "slug" => Str::slug($request->name),
            "created_at" => Carbon::now()
        ]);
        if($request->category){
            $forum->categories()->attach($request->category);
        }
        return response()->json([
            "message" => "Data berhasil di tambahkan",
            "forum" => $forum
        ]);
    }

    public function find($id){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        if(!Forum::where("id", $id)->first()){
            return response()->json(['error' => 'Data not found'], 402);
        }
        return response()->json(["data" => Forum::where("id", $id)->with(['user','comments','categories'])->first()]);
    }

    public function update(Request $request, $id){
        $request->validate([
            "user" => "required",
            "name" => "required",
            "description" => "required",
            "category" => "required",
        ]);
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        $user = User::where("id", $request->user)->first();
        if(!$user){
            return response()->json(['error' => 'Invalid user'], 402);
        }
        $forum = Forum::where("id", $id)->first();
        $forum->update([
            "user_id" => $user->id,
            "name" => $request->name,
            "description" => $request->description,
            "slug" => Str::slug($request->name),
            "updated_at" => Carbon::now()
        ]);
        if($request->category){
            $forum->categories()->sync($request->category);
        }

        return response()->json([
            "message" => "Data berhasil di edit",
            "forum" => Forum::where("id", $id)->with(['user','comments','categories'])->first()
        ]);
    }

    public function deletes($id){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        $forum = Forum::where("id", $id)->delete();
        return response()->json([
            "message" => "Data berhasil dihapus",
        ]);
    }
}
