<?php

namespace App\Http\Controllers;

use App\Models\ReportAlat;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PemetaanController extends Controller
{
    public function index(){
        return response()->json(["data" => ReportAlat::with(['alat','user'])->get()]);
    }
    public function post(Request $request){

    }

    public function update(Request $request, $id){

    }

    public function deletes($id){

    }
}
