<?php

namespace App\Http\Controllers;

use App\Models\Forum;
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
            return $forum->user->username ?? $forum->name;
        })->make(true);
    }

    public function post(Request $request){
        $request->validate([
            "user" => "required",
            "name" => "required",
            "description" => "required",
        ]);

        $forum = Forum::create([
            "user_id" => $request->user,
            "name" => $request->name,
            "description" => $request->description,
            "slug" => Str::slug($request->name),
            "created_at" => Carbon::now()
        ]);
        //$forum->categories()->attach($request->categories);
        return response()->json($forum);
    }

    public function find($id){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        return response()->json(["data" => Forum::where("id", $id)->with(['user','comments','categories'])->first()]);
    }

    public function update(Request $request, $id){
        $request->validate([
            "user" => "required",
            "name" => "required",
            "description" => "required",
        ]);
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        $forum = Forum::where("id", $id)->first();
        $forum->update([
            "user_id" => $request->user,
            "name" => $request->name,
            "description" => $request->description,
            "slug" => Str::slug($request->name),
            "updated_at" => Carbon::now()
        ]);

        // $forum->categories()->sync($request->categories);
        return response()->json($forum);
    }

    public function deletes($id){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        $forum = Forum::where("id", $id)->delete();
        return response()->json($forum);
    }
}
