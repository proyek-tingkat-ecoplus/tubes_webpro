<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Forum;
use App\Models\Proposal;
use App\Models\ReportAlat;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function view(){
        $mostCommented = Forum::withCount('comments')->orderBy('comments_count',"DESC")->limit(5)->get();
        return view('admin.pages.dashboard',[
            'mostCommented' => $mostCommented,
        ]);
    }
    public function map_ARRAY($data) {
        $filtered = [];
        $bulanMap = [];
        // seet all data to month : total
        foreach ($data as $entry) {
            $bulanMap[$entry['bulan']] = $entry['total'];
        }
        for ($month = 1; $month <= 12; $month++) {
            // check if month exist in 1-12
            $filtered[] = isset($bulanMap[$month]) ? $bulanMap[$month] : 0;
        }
        return $filtered;
    }
    public function dashboard(){
        $forum = Forum::count();
        $user = User ::count();
        $proposal = Proposal::count();
        $comment = Comment::count();
        $pemetaan = ReportAlat::count();

        //$proposal_pending = Proposal::where('status','pending')->selectRaw('MONTH(tanggal_pengajuan) as bulan,YEAR(tanggal_pengajuan) as tahun,COUNT(*) as total')->groupByRaw('bulan,tahun')->orderBy('tahun','desc')->get()->toArray();
        $proposal_pending = $this->map_ARRAY(Proposal::where('status','pending')->selectRaw('MONTH(tanggal_pengajuan) as bulan,COUNT(*) as total')->groupByRaw('bulan')->orderBy('bulan','asc')->get()->toArray());
        $proposal_approved = $this->map_ARRAY(Proposal::where('status','approved')->selectRaw('MONTH(tanggal_pengajuan) as bulan,COUNT(*) as total')->groupByRaw('bulan')->orderBy('bulan','asc')->get()->toArray());
        $proposal_rejected = $this->map_ARRAY(Proposal::where('status','rejected')->selectRaw('MONTH(tanggal_pengajuan) as bulan,COUNT(*) as total')->groupByRaw('bulan')->orderBy( 'bulan','asc')->get()->toArray());

        $proposal_daerah_bandungbarat = $this->map_ARRAY(Proposal::where('daerah','bandung_barat')->selectRaw('MONTH(tanggal_pengajuan) as bulan,COUNT(*) as total')->groupByRaw('bulan')->orderBy('bulan','asc')->get()->toArray());
        $proposal_daerah_bandungtimur = $this->map_ARRAY(Proposal::where('daerah','bandung_timur')->selectRaw('MONTH(tanggal_pengajuan) as bulan,COUNT(*) as total')->groupByRaw('bulan')->orderBy('bulan','asc')->get()->toArray());
        $proposal_daerah_bandungselatan = $this->map_ARRAY(Proposal::where('daerah','bandung_selatan')->selectRaw('MONTH(tanggal_pengajuan) as bulan,COUNT(*) as total')->groupByRaw('bulan')->orderBy('bulan','asc')->get()->toArray());

        return response()->json([
            'total_forum' => $forum,
            'total_user' => $user,
            'total_proposal' => $proposal,
            'total_comment' => $comment,
            'total_pemetaan' => $pemetaan,
            'proposal_count_pending'=> $proposal_pending,
            'proposal_count_approved'=> $proposal_approved,
            'proposal_count_rejected'=> $proposal_rejected,
            'proposal_daerah_bandungbarat' => $proposal_daerah_bandungbarat,
            'proposal_daerah_bandungtimur' => $proposal_daerah_bandungtimur,
            'proposal_daerah_bandungselatan' => $proposal_daerah_bandungselatan
        ]);
    }
}
