<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function post(Request $request){

        $asset = public_path('asset/admin/json/proposal.json');
        $data = json_decode(file_get_contents($asset), true); // get file ini
        $filename = $request->name . '_' . uniqid() . '.' . $request->file('file')->extension();
        $path = $request->file('file')->move(public_path('asset/admin/proposal'), $filename);
        $data['data'][] = [ // masukin ke "data" : []
            "id" => $request->id,
            "name" => $request->name,
            "description" => $request->description,
            "status" => $request->status,
            "file" => 'asset/admin/proposal/' . $filename,
            "created_at" => Carbon::now()->format('Y-m-d H:i:s'),
            "updated_at" => "",
        ];
        file_put_contents($asset, json_encode($data)); // set file ini
        return response()->json($data);
    }

    public function update(Request $request, $id){
        $asset = public_path('asset/admin/json/proposal.json');
        $data = json_decode(file_get_contents($asset), true); // get file ini
        $ids =  collect($data['data'])->where("id", $id)->keys()[0];
        if(file_exists(public_path($data['data'][$ids]['file']))){
            unlink(public_path($data['data'][$ids]['file']));
        }
        $filename = $request->name . '_' . uniqid() . '.' . $request->file('file')->extension();
        $path = $request->file('file')->move(public_path('asset/admin/proposal'), $filename);
        $data['data'][$ids] = [ // edit ["data"]["id"]
          "id" => $request->id,
            "name" => $request->name,
            "description" => $request->description,
            "status" => $request->status,
            "file" => 'asset/admin/proposal/' . $filename,
            "created_at" => $data['data'][$ids]['created_at'],
            "updated_at" =>  Carbon::now()->format('Y-m-d H:i:s'),
        ];

        file_put_contents($asset, json_encode($data)); // set file ini
        return response()->json($data);
    }

    public function deletes($id){
        $asset = public_path('asset/admin/json/proposal.json');
        $data = json_decode(file_get_contents($asset), true); // get file ini
        $getDataById = collect($data['data'])->where("id", $id)->keys(); // get data by id

        foreach ($getDataById as $key => $value) {
            if(file_exists(public_path($data['data'][$value]['file']))){
                unlink(public_path($data['data'][$value]['file']));
            }
            unset($data['data'][$value]);
        }

        file_put_contents($asset, json_encode($data)); // update file ini
        return response()->json($data);
    }
}
