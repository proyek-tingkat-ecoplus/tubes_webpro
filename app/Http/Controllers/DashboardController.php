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
    public function dashboard(){
        $forum = Forum::count();
        $user = User ::count();
        $proposal = Proposal::count();
        $comment = Comment::count();
        $pemetaan = ReportAlat::count();
        return response()->json([
            'total_forum' => $forum,
            'total_user' => $user,
            'total_proposal' => $proposal,
            'total_comment' => $comment,
            'total_pemetaan' => $pemetaan
        ]);
    }
}
