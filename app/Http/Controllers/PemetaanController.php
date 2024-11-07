<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class PemetaanController extends Controller
{
    public function post(Request $request){

        $asset = public_path('asset/admin/json/pemetaanalat.json');
        $data = json_decode(file_get_contents($asset), true); // get file ini
        $data['data'][] = [ // masukin ke "data" : []
            "id" => $request->id,
            "name" => $request->name,
            "location" => $request->location,
            "langitude" => $request->address_longitude,
            "latitude" => $request->address_latitude,
            "status" => $request->status,
            "created_at" => Carbon::now()->format('Y-m-d H:i:s'),
            "updated_at" => "",
        ];

        file_put_contents($asset, json_encode($data)); // set file ini
        return response()->json($data);
    }

    public function update(Request $request, $id){
        $asset = public_path('asset/admin/json/pemetaanalat.json');
        $data = json_decode(file_get_contents($asset), true); // get file ini
        $ids =  collect($data['data'])->where("id", $id)->keys()[0];
        // return response()->json($request->all());
        $data['data'][$ids] = [ // edit ["data"]["id"]
            "id" => $request->id,
            "name" => $request->name,
            "location" => $request->location,
            "langitude" => $request->address_longitude,
            "latitude" => $request->address_latitude,
            "status" => $request->status,
            "created_at" => $data['data'][$ids]['created_at'],
            "updated_at" =>  Carbon::now()->format('Y-m-d H:i:s'),
        ];

        file_put_contents($asset, json_encode($data)); // set file ini
        return response()->json($data);
    }

    public function deletes($id){
        $asset = public_path('asset/admin/json/pemetaanalat.json');
        $data = json_decode(file_get_contents($asset), true); // get file ini
        $getDataById = collect($data['data'])->where("id", $id)->keys(); // get data by id
        foreach ($getDataById as $key => $value) {
            unset($data['data'][$value]);
        }

        file_put_contents($asset, json_encode($data)); // update file ini
        return response()->json($data);
    }
}
