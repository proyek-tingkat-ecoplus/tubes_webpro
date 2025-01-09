<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\ReportAlat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class PemetaanController extends Controller
{
    public function index(){
        return response()->json(["data" => ReportAlat::with(['alat','user','approved_by','rejected_by'])->get()]);
    }
    public function table(){
        return DataTables::of(ReportAlat::with(['alat','user','approved_by','rejected_by']))
            ->addColumn('nama_alat', function($data){
                return $data->alat->nama_alat;
            })
            ->addColumn('kode_alat', function($data){
                return $data->alat->kode_alat;
            })
            ->addColumn('status', function($data){
                if($data->status == "pending"){
                    return "<span class='badge bg-warning'>Pending</span>";
                }
                if($data->status == "approved"){
                    return "<span class='badge bg-success'>Approved</span>";
                }
                if($data->status == "rejected"){
                    return "<span class='badge bg-danger'>Rejected</span>";
                }
            })
            ->rawColumns(['status'])
            ->make(true);
    }
    public function find($id){
        return response()->json(["data" => ReportAlat::with(['alat','user','approved_by','rejected_by'])->where('id', $id)->first()]);
    }
    public function post(Request $request){
        $request->validate([
            "id_alat" => "required",
            "deskripsi" => "required",
            "binwas" => "required",
            "tahun_operasi" => "required",
            "latitude" => "required",
            "longitude" => "required",
            "address" => "required",
            "photo" => "required",
            'user_id' => 'required',
            "judul_report" => "required",
        ]);
        $alat = Alat::where('id', $request->id_alat)->first();
        if(!empty($alat)){
            if (File::exists(public_path('image/pemetaan/' . $alat->foto))) {
                File::delete(public_path('image/pemetaan/' . $alat->foto));  // Delete the file if it exists
            }

            $foto = $request->file('photo');
            $nama = $request->nama_alat.'-'.Carbon::now()->format("Y-m-d-H-i-s").".".$foto->getClientOriginalExtension();
            $foto->move(public_path("\image/pemetaan"),$nama );
            $alat->report_alat()->attach($request->user_id, [
                "judul_report" => $request->judul_report,
                "deskripsi" => $request->deskripsi,
                "binwas" => $request->binwas,
                "tahun_operasi" => $request->tahun_operasi,
                "latitude" => $request->latitude,
                "longitude" => $request->longitude,
                "address" => $request->address,
                "photo" => $nama,
                "status" => "pending",
                "tanggal" => Carbon::now()
            ]);

            if($request->status != "pending"){
                // set default
                $alat->report_alat()->updateExistingPivot($request->user_id, [
                    "status" => "approved",
                    "approved_at" => null,
                    "approved_by" => null,
                    "rejected_at" => null,
                    "rejected_by" => null
                ]);
                // add status
                if($request->status == "approved"){
                    $alat->report_alat()->updateExistingPivot($request->user_id, [
                        "status" => "approved",
                        "approved_at" => Carbon::now(),
                        "approved_by" => $request->user_id
                    ]);
                }
                if($request->status == "rejected"){
                    $alat->report_alat()->updateExistingPivot($request->user_id, [
                        "status" => "rejected",
                        "rejected_at" => Carbon::now(),
                        "rejected_by" => $request->user_id
                    ]);
                }
            }


        }else{
            return response()->json(["message" => "Data tidak ditemukan"]);
        }
        return response()->json(["message" => "Data berhasil ditambahkan"]);
    }

    public function update(Request $request, $id){
        $request->validate([
            "id_alat" => "required",
            "deskripsi" => "required",
            "binwas" => "required",
            "tahun_operasi" => "required",
            "latitude" => "required",
            "longitude" => "required",
            "address" => "required",
            "photo" => "required",
            "judul_report" => "required",
        ]);
        $reportAlaat = ReportAlat::where('id', $id)->first();
        if(!empty($reportAlaat)){
            $foto = $request->file('photo');
            $nama = $request->judul_report.'-'.Carbon::now()->format("Y-m-d-H-i-s").".".$foto->getClientOriginalExtension();
            $foto->move(public_path("\image/pemetaan"),$nama );
            $reportAlaat->update([
                "judul_report" => $request->judul_report,
                "deskripsi" => $request->deskripsi,
                "binwas" => $request->binwas,
                "tahun_operasi" => $request->tahun_operasi,
                "latitude" => $request->latitude,
                "longitude" => $request->longitude,
                "address" => $request->address,
                "photo" => $nama,
                "status" => "pending",
                "tanggal" => Carbon::now()
            ]);

            if($request->status != "pending"){
                // set default
                $reportAlaat->update([
                    "status" => "approved",
                    "approved_at" => null,
                    "approved_by" => null,
                    "rejected_at" => null,
                    "rejected_by" => null
                ]);
                if($request->status == "approved"){
                    $reportAlaat->update([
                        "status" => "approved",
                        "approved_at" => Carbon::now(),
                        "approved_by" => $request->user_id
                    ]);
                }
                if($request->status == "rejected"){
                    $reportAlaat->update([
                        "status" => "rejected",
                        "rejected_at" => Carbon::now(),
                        "rejected_by" => $request->user_id
                    ]);
                }
            }
        }else{
            return response()->json(["message" => "Data tidak ditemukan"]);
        }
        return response()->json(["message" => "Data berhasil diubah"]);
    }

    public function deletes($id)
    {
        $alat = ReportAlat::where('id', $id)->first();

        if(File::exists(public_path('image/pemetaan/'.$alat->photo))) {
            File::delete(public_path('image/pemetaan/'.$alat->photo));  // Delete the file if it exists
        }
        if(!empty($alat)){
            $alat->delete();
        }
        return response()->json(["message" => "Data berhasil dihapus"]);

    }
}
