<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function post(Request $request){

        $asset = public_path('asset/admin/json/role.json');
        $data = json_decode(file_get_contents($asset), true); // get file ini
        $data['data'][] = [ // masukin ke "data" : []
            "id" => $request->id,
            "name" => $request->name,
            "description" => $request->description,
        ];

        file_put_contents($asset, json_encode($data)); // set file ini
        return response()->json($data);
    }

    public function update(Request $request, $id){
        $asset = public_path('asset/admin/json/role.json');
        $data = json_decode(file_get_contents($asset), true); // get file ini
        $ids =  collect($data['data'])->where("id", $id)->keys()[0];
        // return response()->json($request->all());
        $data['data'][$ids] = [ // edit ["data"]["id"]
            "id" => $request->id,
            "name" => $request->name,
            "description" => $request->description,
        ];

        file_put_contents($asset, json_encode($data)); // set file ini
        return response()->json($data);
    }

    public function deletes($id){
        $asset = public_path('asset/admin/json/role.json');
        $data = json_decode(file_get_contents($asset), true); // get file ini
        $getDataById = collect($data['data'])->where("id", $id)->keys(); // get data by id
        foreach ($getDataById as $key => $value) {
            unset($data['data'][$value]);
        }

        file_put_contents($asset, json_encode($data)); // update file ini
        return response()->json($data);
    }
}
