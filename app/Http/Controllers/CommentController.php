<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        return response()->json(["data"=> Comment::with(['user','form','parent'])->get()]);
    }

    public function post(Request $request){
        $request->validate([
            "user_id" => "required",
            "post_id" => "required",
            "comment" => "required",
            "parent_id" => "required",
        ]);

        if($request->parent_id != 0){
            $parent = Comment::where("id", $request->parent_id)->first();
            if(empty($parent)){
                return response()->json(['error' => 'Invalid parent id'], 402);
            }
        }

        $comment = Comment::create([
            "user_id" => $request->user_id,
            "post_id" => $request->post_id,
            "comment" => $request->comment,
            "parent_id" => $request->parent_id,
        ]);
        return response()->json($comment);
    }

    public function find($id){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        return response()->json(["data" => Comment::where("id", $id)->with(['user','form','parent'])->first()]);
    }

    public function update(Request $request, $id){
        $request->validate([
            "user_id" => "required",
            "post_id" => "required",
            "comment" => "required",
            "parent_id" => "required",
        ]);

        $comment = Comment::where("id", $id)->first();
        $comment->update([
            "user_id" => $request->user_id,
            "post_id" => $request->post_id,
            "comment" => $request->comment,
            "parent_id" => $request->parent_id,
        ]);
        return response()->json($comment);
    }

    public function deletes($id){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        $comment = Comment::where("id", $id)->delete();
        return response()->json($comment);
    }

    public function getCommentByPost($id){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        return response()->json(["data" => Comment::where("post_id", $id)->with(['user','form','parent'])->get()]);
    }
}
