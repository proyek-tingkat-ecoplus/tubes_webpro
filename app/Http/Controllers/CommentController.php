<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Forum;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CommentController extends Controller
{
    public function index(){
        return response()->json(["data"=> Comment::with(['user','form','parent'])->get()]);
    }

    public function table (){
        return DataTables::of(Comment::all())
        ->addColumn('author', function($comment){
            return $comment->user->username;
        })
        ->addColumn('post', function($comment){
            return $comment->form->name;
        })
        ->make(true);
    }

    public function post(Request $request){
        $request->validate([
            "user_id" => "required",
            "forum_id" => "required",
            "comment" => "required",
            //"parent_id" => "required",
        ]);

        if($request->parent_id != 0){
            $parent = Comment::where("id", $request->parent_id)->first();
            if(empty($parent)){
                return response()->json(['error' => 'Invalid parent id'], 402);
            }
        }

        if($request->forum_id != 0){
            $forum = Forum::where("id", $request->forum_id)->first();
            if(empty($forum)){
                return response()->json(['error' => 'Invalid forum id'], 402);
            }
        }

        if($request->user_id != 0){
            $user = User::where("id", $request->user_id)->first();
            if(empty($user)){
                return response()->json(['error' => 'Invalid user id'], 402);
            }
        }

        if($request->parent_id != 0){
            $parent = Comment::where("id", $request->parent_id)->first();
            if(empty($parent)){
                return response()->json(['error' => 'Invalid parent id'], 402);
            }
        }

        $comment = Comment::create([
            "user_id" => $request->user_id,
            "forum_id" => $request->forum_id,
            "content" => $request->comment,
            "parent_id" => $request->parent_id,
        ]);
        return response()->json([
            "message" => "Data berhasil di tambahkan",
            "comment" => $comment,
        ]);
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
            "forum_id" => "required",
            "comment" => "required",
            //"parent_id" => "required",
        ]);

        if($request->forum_id != 0){
            $forum = Forum::where("id", $request->forum_id)->first();
            if(empty($forum)){
                return response()->json(['error' => 'Invalid forum id'], 402);
            }
        }

        if($request->user_id != 0){
            $user = User::where("id", $request->user_id)->first();
            if(empty($user)){
                return response()->json(['error' => 'Invalid user id'], 402);
            }
        }

        $comment = Comment::where("id", $id)->first();
        if(empty($comment)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        $comment->update([
            "user_id" => $request->user_id,
            "forum_id" => $request->forum_id,
            "content" => $request->comment,
            //"parent_id" => $request->parent_id,
        ]);

        if($request->parent_id != 0){
            $parent = Comment::where("id", $request->parent_id)->first();
            if(empty($parent)){
                return response()->json(['error' => 'Invalid parent id'], 402);
            }
            $comment->parent_id = $request->parent_id;
            $comment->save();
        }
        return response()->json([
            "message" => "Data berhasil di edit",
            "comment" => Comment::where("id", $id)->with(['user','form','parent'])->first(),
        ]);
    }

    public function deletes($id){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        $comment = Comment::where("id", $id)->delete();
        return response()->json([
            "message" => "Data berhasil di hapus",
        ]);
    }

    public function getCommentByPost($id){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        return response()->json(["data" => Comment::where("post_id", $id)->with(['user','form','parent'])->get()]);
    }
}
