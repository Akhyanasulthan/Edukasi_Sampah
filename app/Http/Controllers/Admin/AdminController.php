<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalVisitors = \App\Models\Visitor::count();
        $totalEvaluations = \App\Models\Evaluation::count();
        
        $understandingStats = []; // Fitur ini sedang disesuaikan dengan form dinamis
        $intentionStats = []; 
        $recentFeedbacks = collect(); // Fitur ini sedang disesuaikan dengan form dinamis

        return view('admin.dashboard', compact(
            'totalVisitors',
            'totalEvaluations',
            'understandingStats',
            'intentionStats',
            'recentFeedbacks'
        ));
    }
}
