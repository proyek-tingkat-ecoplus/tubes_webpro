<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProposalController extends Controller
{
    public function index(){
        $user = auth()->user();

        if ($user->role->name === 'kepala desa') {
            $proposals = Proposal::where('user_id', $user->id)
                ->with(['user', 'approved_by', 'rejected_by'])
                ->get();
        } elseif ($user->role->name === 'Admin') {
            $proposals = Proposal::with(['user', 'approved_by', 'rejected_by'])->get();
        } else {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return response()->json(['data' => $proposals]);
    }
    public function table(){
        return DataTables::of(Proposal::with(['user', 'approved_by', 'rejected_by'])->get())
        ->addColumn('title', function($data){
            return strlen($data->title) > 10 ? substr($data->title, 0, 15)."..." : $data->title;
        })
        ->addColumn('description', function($data){
            return strlen($data->description) > 10 ? substr($data->description, 0, 15)."..." : $data->description;
        })
        ->make(true);
    }
    public function post(Request $request){
        $request->validate([
            "user_id" => "required",
            "title" => "required",
            "description" => "required|min:20",
            "attachment" => "required|file|mimes:pdf,docx,doc",
            // "delivery_time" => "required",
            "start_date" => "required|date|before:end_date",
            "end_date" => "required|date|after:start_date",
        ]);

        $name = $request->title.'-'.Carbon::now()->format("Y-m-d-H-i-s").".".$request->attachment->getClientOriginalExtension();
        $request->attachment->move(public_path('attachment'), $name);

        if($request->user_id != 0){
            $user = User::where("id", $request->user_id)->first();
            if(empty($user)){
                return response()->json(['error' => 'Invalid user id'], 402);
            }
        }
        $proposal = Proposal::create([

            "title" => $request->title,
            "description" => $request->description,
            "attachment" => $name,
            // "delivery_time" =>Carbon::now(),
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "status" => "pending",
            "created_at" => Carbon::now(),
            "user_id" => auth()->user()->id
        ]);
        return response()->json([
            "message" => "Data berhasil di tambahkan",
        ]);
    }

    public function find($id){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        return response()->json(["data" => Proposal::where("id", $id)->with(['user','approved_by','rejected_by'])->first()]);
    }

    public function update(Request $request, $id){
        return response()->json([
            "message" => "Data berhasil di edit",
            // "proposal" => Proposal::find($id)
        ]);
        $request->validate([
            "user_id" => "required",
            "title" => "required",
            "description" => "required",
        "attachment" => "required|file|mimes:pdf,docx,doc",
            // "delivery_time" => "required",
            "start_date" => "required|date|before:end_date",
            "end_date" => "required|date|after:start_date",
        ]);

        $name = $request->title.'-'.Carbon::now()->format("Y-m-d-H-i-s").".".$request->attachment->getClientOriginalExtension();
        $request->attachment->move(public_path('attachment'), $name);
        $proposal = Proposal::where("id", $id)->update([
            "user_id" => auth()->user()->id,
            "title" => $request->title,
            "description" => $request->description,
            "attachment" => $name,
            // "delivery_time" => $request->delivery_time,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "status" => "pending",
            "created_at" => Carbon::now()

        ]);
        return response()->json([
            "message" => "Data berhasil di edit",
            // "proposal" => Proposal::find($id)
        ]);
    }

    public function deletes($id){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        $proposal = Proposal::where("id", $id)->delete();
        return response()->json([
            "message" => "Data berhasil di hapus",
            // "proposal" => Proposal::find($id)
        ]);
    }
}
