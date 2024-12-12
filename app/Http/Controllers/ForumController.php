<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index(){
        return response()->json(["data"=> Forum::with(['user','comments','categories'])->get()]);
    }

    public function post(Request $request){
        $request->validate([
            "user_id" => "required",
            "name" => "required",
            "description" => "required",
            "slug" => "required",
            "categories" => "required",
        ]);

        $forum = Forum::create([
            "user_id" => $request->user_id,
            "name" => $request->name,
            "description" => $request->description,
            "slug" => $request->slug,
            "created_at" => Carbon::now()
        ]);
        $forum->categories()->attach($request->categories);
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
            "user_id" => "required",
            "name" => "required",
            "description" => "required",
            "slug" => "required",
            "categories" => "required",
        ]);
        $forum = Forum::where("id", $id)->first();
        $forum->update([
            "user_id" => $request->user_id,
            "name" => $request->name,
            "description" => $request->description,
            "slug" => $request->slug,
        ]);

        $forum->categories()->sync($request->categories);
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
