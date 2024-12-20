<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;

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
        })->addColumn("avatar", function($column){
            return "<img src='".asset($column->photo)."' width='50px' height='50px'>";
        })
        ->rawColumns(["avatar"])
        ->make(true);
    }
    public function post(Request $request){

        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email",
            "role" => "required",
            "password" => "required",
            "avatar" => "required|image",
        ]);

        $foto = $request->file('avatar');
        $photo = $request->name.'-'.Carbon::now()->format("Y-m-d-H-i-s").".".$foto->getClientOriginalExtension();
        $path = "image/profile/".$photo;
        $foto->move(public_path("\image\profile"),$photo );

        $data = User::create([
            "username" => $request->name,
            "password" => Hash::make($request->password),
            "email" => $request->email,
            "role_id" => $request->role,
            "photo" => $path
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
            "password" => "required",
            "avatar" => "required|image",
        ]);

        $user = User::where('id', $id)->first();

        if(empty($user)){
            return response()->json(['error' => 'Invalid alat id'], 402);
        }
        if(File::exists(public_path('image/profile/' . $user->foto))){
            File::delete(public_path('image/profile/' . $user->foto));  // Delete the file if it exists
        }

        $foto = $request->file('avatar');
        $photo = $request->name.'-'.Carbon::now()->format("Y-m-d-H-i-s").".".$foto->getClientOriginalExtension();
        $path = "image/profile/".$photo;
        $foto->move(public_path("\image\profile"),$photo );

        $data = User::where("id", $id)->update([
            "username" => $request->name,
            "password" => Hash::make($request->password),
            "email" => $request->email,
            "role_id" => $request->role,
            "photo" => $path
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

    public function editProfile(Request $request){
        $request->validate([
            "user_id" => "required",
            "name" => "required",
            "email" => "required",
            "password" => "required",
           // "avatar" => "required|image",
        ]);

        //$user = User::where('id', auth()->user()->id)->first();

        // if(empty($user)){
        //     return response()->json(['error' => 'Invalid alat id'], 402);
        // }
        // if(File::exists(public_path('image/profile/' . $user->foto))){
        //     File::delete(public_path('image/profile/' . $user->foto));  // Delete the file if it exists
        // }

        // $foto = $request->file('avatar');
        // $photo = $request->name.'-'.Carbon::now()->format("Y-m-d-H-i-s").".".$foto->getClientOriginalExtension();
        // $path = "image/profile/".$photo;
        // $foto->move(public_path("\image\profile"),$photo );

        $data = User::where("id", $request->user_id)->update([
            "username" => $request->name,
            "password" => Hash::make($request->password),
            "email" => $request->email,
            //"role_id" => $request->role,
           // "photo" => $path
        ]);
        return redirect()->back()->with('success', 'Profile berhasil di update');
    }


}
