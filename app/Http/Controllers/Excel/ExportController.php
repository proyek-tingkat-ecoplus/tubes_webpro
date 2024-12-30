<?php

namespace App\Http\Controllers\Excel;

use App\Exports\AlatExport;
use App\Exports\CommentExport;
use App\Exports\ForumExport;
use App\Exports\ReportAlatExport;
use App\Exports\RoleExport;
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

    public function exportRole()
    {
        return (new RoleExport)->download('roles.xlsx');
    }

    public function exportForum()
    {
        return (new ForumExport)->download('forum.xlsx');
    }

    public function exportComment()
    {
        return (new CommentExport)->download('comments.xlsx');
    }

    public function exportInventaris()
    {
        return (new AlatExport)->download('inventaris.xlsx');
    }

    public function exportPemetaan()
    {
        return (new ReportAlatExport)->download('pemetaan.xlsx');
    }
}
