<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KantorDinas;
use Yajra\DataTables\DataTables;

class KantorDinasController extends Controller
{
    public function index(){
        return response()->json(["data" => KantorDinas::with(['users'])->get()]);
    }

    public function table(){
        return DataTables::of(KantorDinas::with('users')->get())
            ->addColumn('c', function($c){
                return $c->users->count();
            })
            ->rawColumns(['c'])
            ->make(true);
    }

    public function post(Request $request){
        $request->validate([
            "nama" => "required",
            "bio" => "required",
            "alamat" => "required",
            "kode_pos" => "required",
            "no_telp" => "required",
            "email" => "required|email",
            "website" => "required|url",
            "tanggal_jam_buka" => "required|date_format:H:i:s",
            "tanggal_jam_tutup" => "required|date_format:H:i:s"
        ]);

        $kantorDinas = KantorDinas::create($request->all());

        return response()->json([
            "message" => "Data berhasil di tambahkan",
            "kantor_dinas" => $kantorDinas
        ]);
    }

    public function find($id){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        if(!KantorDinas::where("id", $id)->first()){
            return response()->json(['error' => 'Data not found'], 402);
        }
        return response()->json([
            "data" =>
            KantorDinas::where("id", $id)->with(['users'])->first()
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            "nama" => "required",
            "bio" => "required",
            "alamat" => "required",
            "kode_pos" => "required",
            "no_telp" => "required",
            "email" => "required|email",
            "website" => "required|url",
            "tanggal_jam_buka" => "required|date_format:H:i:s",
            "tanggal_jam_tutup" => "required|date_format:H:i:s"
        ]);

        $kantorDinas = KantorDinas::find($id);
        if(!$kantorDinas){
            return response()->json(['error' => 'Data not found'], 402);
        }

        $kantorDinas->update($request->all());

        return response()->json([
            "message" => "Data berhasil di update",
            "kantor_dinas" => $kantorDinas
        ]);
    }

    public function deletes($id){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        $kantorDinas = KantorDinas::find($id);
        if(!$kantorDinas){
            return response()->json(['error' => 'Data not found'], 402);
        }
        $kantorDinas->delete();

        return response()->json([
            "message" => "Data berhasil di hapus"
        ]);
    }
    public function search(Request $request){
        $search = $request->input('search');
        if(empty($search)){
            return response()->json(['error' => 'Invalid search'], 402);
        }
        $kantorDinas = KantorDinas::where('nama', 'like', "%$search%")->get();
        if($kantorDinas->isEmpty()){
            return response()->json(['error' => 'Data not found'], 402);
        }
        return response()->json([
            "data" => $kantorDinas
        ]);
    }
    public function filter(Request $request){
        $filter = $request->input('filter');
        if(empty($filter)){
            return response()->json(['error' => 'Invalid filter'], 402);
        }
        $kantorDinas = KantorDinas::where('nama', 'like', "%$filter%")->get();
        if($kantorDinas->isEmpty()){
            return response()->json(['error' => 'Data not found'], 402);
        }
        return response()->json([
            "data" => $kantorDinas
        ]);
    }

    public function  countPetugas(){
        if(empty($id)){
            return response()->json(['error' => 'Invalid id'], 402);
        }
        $kantorDinas = KantorDinas::withCount('users')->get();
        if(!$kantorDinas){
            return response()->json(['error' => 'Data not found'], 402);
        }
        return response()->json([
            "data" => $kantorDinas
        ]);
    }




}
