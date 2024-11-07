<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function post(Request $request){

        $asset = public_path('asset/admin/json/forum.json');
        $data = json_decode(file_get_contents($asset), true); // get file ini
        $data['data'][] = [ // masukin ke "data" : []
            "id" => $request->id,
            "author" => $request->author,
            "tag" => $request->tag,
            "title" => $request->title,
            "content" => $request->content,
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString(),
        ];

        file_put_contents($asset, json_encode($data)); // set file ini
        return response()->json($data);
    }

    public function update(Request $request, $id){
        $asset = public_path('asset/admin/json/forum.json');
        $data = json_decode(file_get_contents($asset), true); // get file ini
        $ids =  collect($data['data'])->where("id", $id)->keys()[0];
        // return response()->json($request->all());
        $data['data'][$ids] = [ // edit ["data"]["id"]
            "id" => $request->id,
            "author" => $request->author,
            "tag" => $request->tag,
            "title" => $request->title,
            "content" => $request->content,
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString(),
        ];

        file_put_contents($asset, json_encode($data)); // set file ini
        return response()->json($data);
    }

    public function deletes($id){
        $asset = public_path('asset/admin/json/forum.json');
        $data = json_decode(file_get_contents($asset), true); // get file ini
        $getDataById = collect($data['data'])->where("id", $id)->keys(); // get data by id
        foreach ($getDataById as $key => $value) {
            unset($data['data'][$value]);
        }

        file_put_contents($asset, json_encode($data)); // update file ini
        return response()->json($data);
    }
}
