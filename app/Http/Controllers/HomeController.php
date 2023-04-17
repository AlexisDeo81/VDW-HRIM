<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use DB;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $items = DB::table('announcements')->get();
        $items = DB::table('announcements')
        ->orderBy('id', 'desc')
        ->get();
        $staff = DB::table('staff')->count();
        $users = DB::table('users')->count();
        $user_activity_logs = DB::table('user_activity_logs')->count();
        $activity_logs = DB::table('activity_logs')->count();
        $data = DB::table('general_documents')->get();
        $data2 = User::join('employee_documents', function($join) {
            $join->on('employee_documents.user_id', '=', 'users.id');
        })->get();
        return view('home',compact('staff','users','user_activity_logs','activity_logs', 'data', 'data2','items'));
    }
}
