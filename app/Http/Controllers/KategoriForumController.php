<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
class KategoriForumController extends Controller
{
    public function index(){
        return response()->json(["data" => Category::with(['forum'])->get()]);
    }
    public function table(){
      return DataTables::of(Category::with('forums')->get())
        ->addColumn('c', function($c){
            return $c->forums->count();
        })
        ->rawColumns(['c'])
        ->make(true);
    }

    public function post(Request $request){
        $request->validate([
            "name" => "required",
            "description" => "required",
        ]);

        $forum = Category::create([
            "user_id" => $request->user,
            "name" => $request->name,
            "description" => $request->description,
            "slug" => Str::slug($request->name),
            "created_at" => Carbon::now()
        ]);

        return response()->json([
            "message" => "Data berhasil di tambahkan",
            "forum" => $forum
        ]);
    }

    public function find($id){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        if(!Category::where("id", $id)->first()){
            return response()->json(['error' => 'Data not found'], 402);
        }
        return response()->json([
            "data" =>
            Category::where("id", $id)->with(['forums'])->first()
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            "name" => "required",
            "description" => "required",
        ]);
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        $forum = Category::where("id", $id)->first();
        $forum->update([
            "user_id" => $forum->user_id,
            "name" => $request->name,
            "description" => $request->description,
            "slug" => Str::slug($request->name),
            "updated_at" => Carbon::now()
        ]);

        return response()->json([
            "message" => "Data berhasil di edit",
            "forum" => Category::where("id", $id)->with(['forums'])->first()
        ]);
    }

    public function deletes($id){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        $forum = Category::where("id", $id)->delete();
        return response()->json([
            "message" => "Data berhasil dihapus",
        ]);
    }
}
