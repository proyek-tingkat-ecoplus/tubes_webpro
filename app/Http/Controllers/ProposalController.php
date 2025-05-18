<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return DataTables::of(Proposal::with(['user', 'approved_by', 'rejected_by'])->orderBy('id','desc')->get())
        ->addColumn('title', function($data){
            return strlen($data->title) > 10 ? substr($data->title, 0, 15)."..." : $data->title;
        })
        ->addColumn('description', function($data){
            return strlen($data->description) > 10 ? substr($data->description, 0, 15)."..." : $data->description;
        })->addColumn('status', content: function($data){
            if(Auth::user()->role->name === 'Kepala Desa'){
                return $data->status == "approved" ? "<span class='badge bg-success'>".$data->status."</span>" : ($data->status == "rejected" ? "<span class='badge bg-danger'>".$data->status."</span>" : "<span class='badge bg-warning'>".$data->status."</span>");
            }else{
            $color = match($data->status) {
                'approved' => 'btn-success',
                'rejected' => 'btn-danger',
                default => 'btn-warning'
            };
            $list = match($data->status) {
                'approved' => "
                <li>
                <button type='submit' class='dropdown-item btn btn-danger btn-up' data-id='$data->id' data-status='rejected'  >Reject</button>
                </li>",
                'rejected' => "<li><button class='dropdown-item btn btn-success btn-status' data-id='$data->id' data-status='approved'>Approve</button></li>",
                default => "
                <li><button class='dropdown-item btn btn-success btn-status' href='#' data-id='$data->id' data-status='approved'>Approve</button></li>
                <li><button class='dropdown-item btn btn-danger btn-status mt-2' data-id='$data->id' data-status='rejected'>Reject</button></li>"
            };
            return "<div class='dropdown'>
            <button class='btn $color dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
                $data->status
                </button>
                <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
                    $list
                </ul>
            </div>";
        }
        })->addColumn("tanggal", function($data){
            return Carbon::parse($data->start_date)->isoFormat("DD-MM-YYYY")." s/d   ".Carbon::parse($data->end_date)->isoFormat("DD-MM-YYYY");
        })
        ->rawColumns(['action', 'status'])
        ->make(true);
    }
    public function post(Request $request){
        $request->validate([
            "user_id" => "required",
            "title" => "required",
            "description" => "required|min:20",
            "daerah" => "required",
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
            "daerah" => $request->daerah,
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
        $request->validate([
            "user_id" => "required",
            "title" => "required",
            "description" => "required",
            "daerah" => "required",
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
            "daerah" => $request->daerah,
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

    public function status(Request $request, $id){
        $request->validate([
            "status" => "required",
            // "reason" => "required"
        ]);
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        $proposal = Proposal::where("id", $id)->first();
        if($request->status == "approved"){
            $proposal->status = "approved";
            $proposal->approved_by = auth()->user()->id;
            $proposal->approved_at = Carbon::now();
        }
        if($request->status == "rejected"){
            $proposal->status = "rejected";
            $proposal->rejected_by = auth()->user()->id;
            $proposal->rejected_at = Carbon::now();
        }
        $proposal->save();

        return response()->json([
            "message" => "Data berhasil di $request->status",
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
