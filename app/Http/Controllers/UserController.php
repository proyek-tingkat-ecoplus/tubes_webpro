<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function post(Request $request){

        $asset = public_path('asset/admin/json/user.json');
        $data = json_decode(file_get_contents($asset), true); // get file ini
        $data['data'][] = [ // masukin ke "data" : []
            "id" => $request->id,
            "name" => $request->name,
            "email" => $request->email,
            "role" => $request->role,
            "status" => $request->status
        ];

        file_put_contents($asset, json_encode($data)); // set file ini
        return response()->json($data);
    }

    public function update(Request $request, $id){
        $asset = public_path('asset/admin/json/user.json');
        $data = json_decode(file_get_contents($asset), true); // get file ini
        $data['data'][$id] = [ // masukin ke "data" : []
            "id" => $request->id,
            "name" => $request->name,
            "email" => $request->email,
            "role" => $request->role,
            "status" => $request->status
        ];

        file_put_contents($asset, json_encode($data)); // set file ini
        return response()->json($data);
    }

    public function delete($id){
        $asset = public_path('asset/admin/json/user.json');
        $data = json_decode(file_get_contents($asset), true); // get file ini
        unset($data['data'][$id]);

        file_put_contents($asset, json_encode($data)); // set file ini
        return response()->json($data);
    }


}
