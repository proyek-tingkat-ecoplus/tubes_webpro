<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
        return response()->json(["data" => Category::with('forums')->get()]);
    }

    public function post(Request $request){
        $request->validate([
            "name" => "required",
            "description" => "required",
            "slug" => "required",
        ]);

        $data = Category::create([
            "name" => $request->name,
            "description" => $request->description,
            "slug" => $request->slug,
        ]);
        return response()->json($data);
    }

    public function find($id){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        return response()->json(["data" => Category::where("id", $id)->with("forums")->first()]);
    }

    public function update(Request $request, $id){
        $request->validate([
            "name" => "required",
            "description" => "required",
            "slug" => "required",
        ]);

        $data = Category::where("id", $id)->update([
            "name" => $request->name,
            "description" => $request->description,
            "slug" => $request->slug,
        ]);
        return response()->json($data);
    }

    public function deletes($id){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        $data = Category::where("id", $id)->delete();
        return response()->json($data);
    }
}
