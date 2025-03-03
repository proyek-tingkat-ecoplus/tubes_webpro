<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use App\Models\AddressDetails;
use App\Models\UserDetails;

class UserController extends Controller
{
    public function index(){
        return response()->json(["data" => User::with(["role","user_details"=>fn($query) => $query->with('address')])->get()]);
    }
    public function table(){
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

        public function getProfile()
    {
        $user = auth()->user();

        return response()->json([
            'name' => $user->username,
            'email' => $user->email,
            'address' => $user->user_details->address->address ?? 'Alamat tidak tersedia',
            'phone' => $user->user_details->phone ?? 'Telepon tidak tersedia',
        ]);
    }

    public function getRole()
    {
        $user = auth()->user();
        return response()->json(['role' => $user->role->name]);
    }

    public function post(Request $request){

        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email",
            "role" => "required",
            "password" => "required",
            "first_name" => "required",
            "last_name" => "required",
            "nik" => "required",
            "address" => "required",
            "phone" => "required",
            "city" => "required",
            "state" => "required",
            "country" => "required",
            "avatar" => "required|image",
        ]);

        $foto = $request->file('avatar');
        $photo = $request->name.'-'.Carbon::now()->format("Y-m-d-H-i-s").".".$foto->getClientOriginalExtension();
        $path = "image/profile/".$photo;
        $foto->move(public_path("\image\profile"),$photo );

        $user = User::create([
            "username" => $request->name,
            "password" => Hash::make($request->password),
            "email" => $request->email,
            "role_id" => $request->role,
            "photo" => $path
        ]);

        $address = AddressDetails::create([
            "address" => $request->address,
            "city" => $request->city,
            "state" => $request->state,
            "country" => $request->country,
        ]);

            $userdet = UserDetails::create([
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "phone" => $request->phone,
                "nik" => $request->nik,
                "address_id" => $address->id,
                "user_id" => $user->id
            ]);

        $userdet->address_id = $address->id;
        $userdet->save();

        return response()->json(["message" => "Data berhasil ditambahkan"]);
    }

    public function find($id){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        return response()->json(["data" => User::where("id", $id)->with(["role","user_details"=>fn($query) => $query->with('address')])->first()]);
    }

    public function edit($id){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        return view('admin.pages.user.edit', ["id" => $id]);
    }

    public function update(Request $request, $id){
        return response()->json(["message" => "Data berhasil diedit"]);
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "role" => "required",
            "first_name" => "required",
            "last_name" => "required",
            "nik" => "required",
            "address" => "required",
            "phone" => "required",
            "city" => "required",
            "state" => "required",
            "country" => "required",
            "avatar" => "required|image",
        ]);

        $user = User::where('id', $id)->first();

        if(empty($user)){
            return response()->json(['error' => 'Invalid user id'], 402);
        }
        if(File::exists(public_path('image/profile/' . $user->foto))){
            File::delete(public_path('image/profile/' . $user->foto));  // Delete the file if it exists
        }

        $foto = $request->file('avatar');
        $photo = $request->name.'-'.Carbon::now()->format("Y-m-d-H-i-s").".".$foto->getClientOriginalExtension();
        $path = "image/profile/".$photo;
        $foto->move(public_path("\image\profile"),$photo );
        $userdetail = UserDetails::where("id", $id)->first();

        $user = User::where("id", $id)->update([
            "username" => $request->name,
            "email" => $request->email,
            "role_id" => $request->role,
            "photo" => $path
        ]);

        AddressDetails::where("id", $userdetail->address_id)->update([
            "address" => $request->address,
            "city" => $request->city,
            "state" => $request->state,
            "country" => $request->country,
        ]);


        $userdet = UserDetails::where("user_id", $id)->update([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "phone" => $request->phone,
            "nik" => $request->nik,
        ]);

        return response()->json(["message" => "Data berhasil diedit"]);
    }


    public function deletes($id){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        User::where("id", $id)->delete();
        return response()->json(["success" => "data berhasil di hapus"], 202);
    }



    public function editpass(Request $request, $id){
        $request->validate([
            "password" => "required",
            "password_confirmation" => "required|same:password"
        ]);
        $user = User::where('id', $id)->first();

        $user = User::where("id", $id)->update([
            "password"=> Hash::make($request->password)
        ]);
        return response()->json(["message" => "Password berhasil di update"]);
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
