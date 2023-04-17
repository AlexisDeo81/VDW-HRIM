<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Models\User;
use App\Models\Form;
use App\Models\GeneralDocument;
use App\Models\JobStatus;
use App\Models\userType;
use App\Rules\MatchOldPassword;
use Carbon\Carbon;
use Session;
use Auth;
use Hash;

class JobStatusController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_name=='Admin' || Auth::user()->role_name=='Hr' || Auth::user()->role_name=='Manager' || Auth::user()->role_name=='Team Leader' || Auth::user()->role_name=='Trainor')
        {
            $data = DB::table('job_statuses')->get();
            return view('usermanagement.job_status_control',compact('data'));
        }
        else
        {
            return redirect()->route('home');
        }
        
    }

    // view detail 
    public function viewDetail($id)
    {  
        if (Auth::user()->role_name=='Admin' || Auth::user()->role_name=='Hr' || Auth::user()->role_name=='Manager' || Auth::user()->role_name=='Team Leader' || Auth::user()->role_name=='Trainor')
        {
            $data = DB::table('job_statuses')->where('id',$id)->get();
            return view('usermanagement.view_jobStatus',compact('data'));
        }
        else
        {
            return redirect()->route('home');
        }
    }

    // add new user
    public function addNewJobStat()
    {
    
        if (Auth::user()->role_name=='Admin' || Auth::user()->role_name=='Hr' || Auth::user()->role_name=='Manager' || Auth::user()->role_name=='Team Leader' || Auth::user()->role_name=='Trainor')
        {
          ;

            $employee = User::all()->sortByDesc("id");
            
            return view('usermanagement.add_new_jobStatus',compact('employee'));
        }
        else
        {
            return redirect()->route('home');
        }
    }


    public function addNewJobStatSave(Request $request)
     {
        $request->validate([
            'name'      => 'required|string|max:255',
            // 'description'      => 'required|string|max:255',
        ]);

        $jobStat = new JobStatus;
        $jobStat->name         = $request->name;
        $jobStat->description         = $request->description;

        $jobStat->save();

        Toastr::success('Create new Job Status successfully :)','Success');
        return redirect()->route('jobStatus');
     }

      // update
    public function updateJobStat(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            // 'description'      => 'required|string|max:255',
        ]);

        $id           = $request->id;
        $name = $request->name;
        $description = $request->description;

        $dt       = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();


        $update = [
            'id'           => $id,
            'name'           => $name,
            'description'           => $description,
        ];

        JobStatus::where('id',$request->id)->update($update);
        Toastr::success('Job Status updated successfully :)','Success');
        return redirect()->route('jobStatus');
        
    }

     // view delete
     public function jobStatDelete($id)
     {
         $delete = JobStatus::find($id);
         $delete->delete();
         Toastr::success('Data deleted successfully :)','Success');
         return redirect()->route('jobStatus');
     }
}
