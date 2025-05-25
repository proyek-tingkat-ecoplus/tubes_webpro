<?php

namespace App\Http\Controllers\pdf;

use App\Http\Controllers\Controller;
use App\Models\Alat;
use App\Models\Comment;
use App\Models\Forum;
use App\Models\KantorDinas;
use App\Models\ReportAlat;
use App\Models\Role;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function exportPdfUser()
    {

        $user = User::with(['role', 'user_details' => function($query){
            $query->with('address');
        }])->get();
        $pdf = Pdf::loadView('exports.pdf.userExport', compact('user'));
        return $pdf->download('invoice.pdf');
    }

    public function exportPdfRole()
    {
        $role = Role::all();
        $pdf = Pdf::loadView('exports.pdf.roleExport', compact('role'));
        return $pdf->download('invoice.pdf');
    }

    public function exportPdfkantorDinas()
    {
        $kantor_dinas = KantorDinas::all();
        $pdf = Pdf::loadView('exports.pdf.kantor_dinasExport', compact('kantor_dinas'));
        return $pdf->download('invoice.pdf');
    }

    public function exportPdfForum()
    {
        $forum = Forum::with(['user', 'comments'])->get();
        $pdf = Pdf::loadView('exports.pdf.forumExport', compact('forum'));
        return $pdf->download('invoice.pdf');
    }

    public function exportPdfComment()
    {
        $comment = Comment::with(['user', 'form'])->get();
        $pdf = Pdf::loadView('exports.pdf.CommentExport', compact('comment'));
        return $pdf->download('invoice.pdf');
    }

    public function exportPdfInventaris()
    {
        $inventaris = Alat::with(['user'])->get();
        $pdf = Pdf::loadView('exports.pdf.inventarisExport', compact('inventaris'));
        return $pdf->download('invoice.pdf');
    }

    public function exportPdfPemetaan()
    {
        $pemetaan = ReportAlat::with(['user', 'alat','approved_by','rejected_by'])->get();
        $pdf = Pdf::loadView('exports.pdf.pemetaanExport', compact('pemetaan'));
        return $pdf->download('invoice.pdf');
    }
}
