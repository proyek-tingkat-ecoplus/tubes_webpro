<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\ReportAlat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PemetaanController extends Controller
{
    public function index(){
        return response()->json(["data" => ReportAlat::with(['alat','user'])->get()]);
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
            return response()->json(["message" => "Data berhasil diubah"]);
        }
        return response()->json(["message" => "Data tidak ditemukan"]);
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
