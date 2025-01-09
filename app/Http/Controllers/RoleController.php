<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    public function index(){
        return response()->json(["data" => Role::all()]);
    }

    public function table(){
        return DataTables::of(Role::all())->make(true);
    }
    public function post(Request $request){

        $request->validate([
            "name" => "required",
            "description" => "required",
        ]);

        $data = Role::create([
            "name" => $request->name,
            "description" => $request->description,
        ]);
        return response()->json([
            "message" => "Data berhasil di tambahkan",
            "role" => $data
        ]);
    }

    public function find($id){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        return response()->json(["data" => Role::where("id", $id)->first()]);
    }

    public function update(Request $request, $id){
        $request->validate([
            "name" => "required",
            "description" => "required",
        ]);

        $data = Role::where("id", $id)->update([
            "name" => $request->name,
            "description" => $request->description,
        ]);
        return response()->json([
            "message" => "Data berhasil di edit",
            "role" => Role::find($id)
        ]);
    }

    public function deletes($id){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        Role::where("id", $id)->delete();
        return response()->json(["success" => "data bershasil di hapus"], 202);
    }

}
