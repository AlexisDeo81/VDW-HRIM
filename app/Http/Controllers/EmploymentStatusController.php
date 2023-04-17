<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Models\User;
use App\Models\Form;
use App\Models\GeneralDocument;
use App\Models\userType;
use App\Rules\MatchOldPassword;
use Carbon\Carbon;
use Session;
use Auth;
use Hash;

class EmploymentStatusController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_name=='Admin' || Auth::user()->role_name=='Hr' || Auth::user()->role_name=='Manager' || Auth::user()->role_name=='Team Leader' || Auth::user()->role_name=='Trainor')
        {
            $data = DB::table('user_types')->get();
            return view('usermanagement.employement_status_control',compact('data'));
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
            $data = DB::table('user_types')->where('id',$id)->get();
            return view('usermanagement.view_employmentStat',compact('data'));
        }
        else
        {
            return redirect()->route('home');
        }
    }

    // add new user
    public function addNewEmploymentStat()
    {
    
        if (Auth::user()->role_name=='Admin' || Auth::user()->role_name=='Hr' || Auth::user()->role_name=='Manager' || Auth::user()->role_name=='Team Leader' || Auth::user()->role_name=='Trainor')
        {
          ;

            $employee = User::all()->sortByDesc("id");
            
            return view('usermanagement.add_new_EmploymentStat',compact('employee'));
        }
        else
        {
            return redirect()->route('home');
        }
    }


    public function addNewEmployStatSave(Request $request)
     {
        $request->validate([
            'name'      => 'required|string|max:255',
            // 'description'      => 'required|string|max:255',
        ]);

        $employStat = new userType;
        $employStat->type_name         = $request->name;
        $employStat->description         = $request->description;

        $employStat->save();

        Toastr::success('Create new Employment Status successfully :)','Success');
        return redirect()->route('employmentStatus');
     }


     // update
    public function updateEmployStat(Request $request)
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
            'type_name'           => $name,
            'description'           => $description,
        ];

        userType::where('id',$request->id)->update($update);
        Toastr::success('Employment Status updated successfully :)','Success');
        return redirect()->route('employmentStatus');
    
    }


    // view delete
    public function employDelete($id)
    {
        $delete = userType::find($id);
        $delete->delete();
        Toastr::success('Data deleted successfully :)','Success');
        return redirect()->route('employmentStatus');
    }


}
