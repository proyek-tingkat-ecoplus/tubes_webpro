<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(){
        // ini make yajra datatables
        return DataTables::of(User::all())
        ->addColumn("role", function($column){
            return $column->role->name ?? null;
        })
        ->addColumn("status", function($column){
            return "Active";
        })
        ->make(true);
    }
    public function post(Request $request){

        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email",
            "role" => "required",
            "password" => "required"
        ]);

        $data = User::create([
            "username" => $request->name,
            "password" => Hash::make($request->password),
            "email" => $request->email,
            "role_id" => $request->role,
        ]);
        return response()->json($data);
    }

    public function find($id){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        return response()->json(["data" => User::where("id", $id)->with("role")->first()]);
    }

    public function update(Request $request, $id){
        $request->validate([
            "name" => "required",
            "email" => "required",
            "role" => "required",
            "password" => "required"
        ]);

        $data = User::where("id", $id)->update([
            "username" => $request->name,
            "password" => Hash::make($request->password),
            "email" => $request->email,
            "role_id" => $request->role,
        ]);
        return response()->json($data);
    }

    public function deletes($id){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        User::where("id", $id)->delete();
        return response()->json(["success" => "data berhasil di hapus"], 202);
    }


}
