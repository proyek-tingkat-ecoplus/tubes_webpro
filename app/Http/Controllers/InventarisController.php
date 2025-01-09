<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;

class InventarisController extends Controller
{
    public function index(){
        return response()->json(["data" => Alat::all()]);
    }
    public function table(){
    return DataTables::of(Alat::all())
        ->addColumn("images", function ($data) {
          return "<img src=".asset("image/inventaris/$data->foto")." width='100' height='100' />";
        })
        ->rawColumns(["images"])
        ->make(true);
    }

    public function find($id){
        return response()->json(['data' => Alat::where("id", $id)->with(["user","report_alat"])->first()]);
    }
    public function post(Request $request){
        $request->validate([
            "user" => "required",
            "nama_alat" => "required",
            "foto" => "required|image",
            "jenis" => "required",
            "jumlah" => "required",
            "kondisi" => "required",
            'deskripsi_barang' => "required"
        ]);
        $foto = $request->file('foto');
        $nama = $request->nama_alat.'-'.Carbon::now()->format("Y-m-d-H-i-s").".".$foto->getClientOriginalExtension();
        $foto->move(public_path("\image\inventaris"),$nama );

        Alat::create([
            "user_id" => $request->user,
            "kode_alat" => $request->nama_alat .'-'.Str::random(8) ,
            "nama_alat" => $request->nama_alat,
            "foto" =>  $nama ,
            "jenis" => $request->jenis,
            "jumlah" => $request->jumlah,
            "deskripsi_barang" => $request->deskripsi_barang,
        ]);
        return response()->json([
            "message" => "data berhasil di tambahkan"
        ]);
    }

    public function edit($id){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        return view('admin.pages.inventaris.edit', ["id" => $id]);
    }

    public function update(Request $request, $id){
        $request->validate([
                "user" => "required",
                "foto" => "required|image",
                "jenis" => "required",
                "jumlah" => "required",
                "kondisi" => "required",
                'deskripsi_barang' => "required"
        ]);
        $alat = Alat::find($id);
        if (File::exists(public_path('image/inventaris/' . $alat->foto))) {
            File::delete(public_path('image/inventaris/' . $alat->foto));  // Delete the file if it exists
        }
        $foto = $request->file('foto');
        $nama = $request->nama_alat.'-'.Carbon::now()->format("Y-m-d-H-i-s").".".$foto->getClientOriginalExtension();
        $foto->move(public_path("\image\inventaris"), $nama);

        $alat->update([
            "user_id" => $request->user,
            "kode_alat" => $request->nama_alat .'-'.Str::random(8) ,
            "nama_alat" => $request->nama_alat,
            "foto" =>  $nama ,
            "jenis" => $request->jenis,
            "jumlah" => $request->jumlah,
            "deskripsi_barang" => $request->deskripsi_barang,
        ]);
        return response()->json([
            "message" => "data berhasil di update"
        ]);
    }

    public function deletes($id){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        $alat = Alat::find($id);
        if(File::exists(public_path('image/inventaris/' . $alat->foto))) {
            File::delete(public_path('image/inventaris/' . $alat->foto));  // Delete the file if it exists
        }
        $alat->delete();
        return response()->json(["success" => "data berhasil di hapus"], 202);
    }
}
