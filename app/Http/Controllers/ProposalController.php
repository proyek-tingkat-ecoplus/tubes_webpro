<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function index(){
        return response()->json(["data"=> Proposal::with(['user','approved_by','rejected_by'])->get()]);
    }

    public function post(Request $request){
        $request->validate([
            "user_id" => "required",
            "title" => "required",
            "description" => "required",
            "attachment" => "required",
            "delivery_time" => "required",
            "start_date" => "required",
            "end_date" => "required",
        ]);

        $name = $request->title.'-'.Carbon::now()->format("Y-m-d-H-i-s").".".$request->attachment->getClientOriginalExtension();
        $request->attachment->move(public_path('attachment'), $name);
        $proposal = Proposal::create([
            "user_id" => $request->user_id,
            "title" => $request->title,
            "description" => $request->description,
            "attachment" => $name,
            "delivery_time" => $request->delivery_time,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "status" => "pending",
            "created_at" => Carbon::now()
        ]);
        return response()->json($proposal);
    }

    public function find($id){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        return response()->json(["data" => Proposal::where("id", $id)->with(['user','approved_by','rejected_by'])->first()]);
    }

    public function update(Request $request, $id){
        $request->validate([
            "user_id" => "required",
            "title" => "required",
            "description" => "required",
            "attachment" => "required",
            "delivery_time" => "required",
            "start_date" => "required",
            "end_date" => "required",
        ]);

        $name = $request->title.'-'.Carbon::now()->format("Y-m-d-H-i-s").".".$request->attachment->getClientOriginalExtension();
        $request->attachment->move(public_path('attachment'), $name);
        $proposal = Proposal::where("id", $id)->update([
            "user_id" => $request->user_id,
            "title" => $request->title,
            "description" => $request->description,
            "attachment" => $name,
            "delivery_time" => $request->delivery_time,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "status" => "pending",
            "created_at" => Carbon::now()
        ]);
        return response()->json($proposal);
    }

    public function deletes($id){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        $proposal = Proposal::where("id", $id)->delete();
        return response()->json($proposal);
    }
}
