<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Models\User;
use App\Models\Form;
use App\Models\GeneralDocument;
use App\Models\LineManager;
use App\Models\userType;
use App\Rules\MatchOldPassword;
use Carbon\Carbon;
use Session;
use Auth;
use Hash;;

class LineManagersController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_name=='Admin' || Auth::user()->role_name=='Hr' || Auth::user()->role_name=='Manager' || Auth::user()->role_name=='Team Leader' || Auth::user()->role_name=='Trainor')
        {
            $data = DB::table('line_managers')->get();
            return view('usermanagement.line_managers_control',compact('data'));
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
    public function addNewLineManager()
    {
    
        if (Auth::user()->role_name=='Admin' || Auth::user()->role_name=='Hr' || Auth::user()->role_name=='Manager' || Auth::user()->role_name=='Team Leader' || Auth::user()->role_name=='Trainor')
        {
          ;

            $employee = User::all()->sortByDesc("id");
            
            return view('usermanagement.add_new_lineManagers',compact('employee'));
        }
        else
        {
            return redirect()->route('home');
        }
    }


    public function addNewLineManagerSave(Request $request)
     {
        $request->validate([
            'name'      => 'required|string|max:255',
            // 'description'      => 'required|string|max:255',
        ]);

        $lineManagers = new LineManager;
        $lineManagers->name         = $request->name;
        $lineManagers->description         = $request->description;

        $lineManagers->save();

        Toastr::success('Create new Line Managers successfully :)','Success');
        return redirect()->route('lineManagers');
     }

     // view detail 
    public function viewLineManagersDetail($id)
    {  
        if (Auth::user()->role_name=='Admin' || Auth::user()->role_name=='Hr' || Auth::user()->role_name=='Manager' || Auth::user()->role_name=='Team Leader' || Auth::user()->role_name=='Trainor')
        {
            $data = DB::table('line_managers')->where('id',$id)->get();
            return view('usermanagement.view_lineManagers',compact('data'));
        }
        else
        {
            return redirect()->route('home');
        }
    }

      // update
      public function updateLineMages(Request $request)
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
  
          LineManager::where('id',$request->id)->update($update);
          Toastr::success('Line Managers updated successfully :)','Success');
          return redirect()->route('lineManagers');
          
      }

      // view delete
     public function lineManagersDelete($id)
     {
         $delete = LineManager::find($id);
         $delete->delete();
         Toastr::success('Data deleted successfully :)','Success');
         return redirect()->route('lineManagers');
     }
}
