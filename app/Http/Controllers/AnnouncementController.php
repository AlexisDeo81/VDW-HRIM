<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\EmployeeDocument;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Models\User;
use App\Models\Form;
use App\Models\GeneralDocument;
use App\Rules\MatchOldPassword;
use Carbon\Carbon;
use Session;
use Auth;
use Hash;

class AnnouncementController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_name=='Admin' || Auth::user()->role_name=='Hr' || Auth::user()->role_name=='Manager' || Auth::user()->role_name=='Team Leader' || Auth::user()->role_name=='Trainor')
        {
            // $data = DB::table('employee_documents')->get();
            // $data = User::join('employee_documents', function($join) {
            //     $join->on('employee_documents.user_id', '=', 'users.id');
            // })->get();
            $data = DB::table('announcements')->get();
            // return view('usermanagement.announcement_control');
            return view('usermanagement.announcement_control',compact('data'));
        }
        else
        {
            return redirect()->route('home');
        }
        
    }

    // add new user
    public function addNewAnnouncement()
    {
    
        if (Auth::user()->role_name=='Admin' || Auth::user()->role_name=='Hr' || Auth::user()->role_name=='Manager' || Auth::user()->role_name=='Team Leader' || Auth::user()->role_name=='Trainor')
        {
          ;

            // $employee = User::all()->sortByDesc("id");
            
            return view('usermanagement.add_new_announcement');

            // return view('usermanagement.add_new_EmployeeDocument',compact('employee'));
        }
        else
        {
            return redirect()->route('home');
        }
    }

    public function addNewAnnouncementSave(Request $request)
    {

        $request->validate([
            
            'name'      => 'required|string|max:255',
            'announcement' => 'required|string',
            'show_to_employees'      => 'required',
        ]);

        $data=new Announcement();

        $data->subject=$request->name;
        $data->posted_by_id=$request->posted_id;
        $data->announcement=$request->announcement;
        $data->show=$request->show_to_employees;
        
        $data->save();
		Toastr::success('Create new announcement successfully :)','Success');
        return redirect()->route('announcement');
      
    }

    // view detail 
    public function ViewAnnouncement($id)
    {  
        if (Auth::user()->role_name=='Admin' || Auth::user()->role_name=='Hr' || Auth::user()->role_name=='Manager' || Auth::user()->role_name=='Team Leader' || Auth::user()->role_name=='Trainor')
        {
            $data = DB::table('announcements')->where('id',$id)->get();
            // $d = DB::table('general_documents')->get();
            return view('usermanagement.view_announcement',compact('data'));
        }
        else
        {
            return redirect()->route('home');
        }
    }

    // update
    public function update(Request $request)
    {

        $request->validate([
            
            'name'      => 'required|string|max:255',
            'announcement' => 'required|string',
            'show_to_employees'      => 'required',
        ]);


        $subject=$request->name;
        $posted_by_id=$request->posted_id;
        $announcement=$request->announcement;
        $show=$request->show_to_employees;

        $update = [
            'subject'           => $subject,
            'posted_by_id'           => $posted_by_id,
            'announcement'           => $announcement,
            'show'           => $show,
            
        ];

        Announcement::where('id',$request->id)->update($update);
        Toastr::success('Announcement updated successfully :)','Success');
        return redirect()->route('announcement');

    }


     // delete
     public function delete($id)
     {
         $user = Auth::User();
         Session::put('user', $user);
         $user=Session::get('user');
 
         $fullName     = $user->first_name;
         $email        = $user->email;
         $phone_number = $user->phone_number;
         $status       = $user->status;
         $role_name    = $user->role_name;
             
         $dt       = Carbon::now();
         $todayDate = $dt->toDayDateTimeString();
 
 
         $activityLog = [
         
             'user_name'    => $fullName,
             'email'        => $email,
             'phone_number' => $phone_number,
             'status'       => $status,
             'role_name'    => $role_name,
             'modify_user'  => 'Delete',
             'date_time'    => $todayDate,
         ];
 
         DB::table('user_activity_logs')->insert($activityLog);
 
         $delete = Announcement::find($id);
         
         $delete->delete();
         Toastr::success('Announcement deleted successfully :)','Success');
         return redirect()->route('announcement');
     }

}
