<?php

namespace App\Http\Controllers\Excel;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportUsers()
    {

        return (new UsersExport)->download('users.xlsx');
    }
}
