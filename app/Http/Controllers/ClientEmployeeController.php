<?php

namespace App\Http\Controllers;

use App\Models\client_employee;
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
use Facade\FlareClient\Http\Client;
use Hash;

class ClientEmployeeController extends Controller
{
    //
    public function index()
    {
        if (Auth::user()->role_name=='Admin' || Auth::user()->role_name=='Hr' || Auth::user()->role_name=='Manager' || Auth::user()->role_name=='Team Leader' || Auth::user()->role_name=='Trainor')
        {
        

            $data = client_employee::join('clients', 'clients.id', '=', 'client_employees.client_id')
            ->join('users', 'users.id', '=', 'client_employees.user_id')->get();
            
            // return view('usermanagement.employeeClient_control');
            
            return view('usermanagement.employeeClient_control',compact('data'));
        }
        else
        {
            return redirect()->route('home');
        }
        
    }

    // add new user
    public function addNewClientEmployee()
    {
    
        if (Auth::user()->role_name=='Admin' || Auth::user()->role_name=='Hr' || Auth::user()->role_name=='Manager' || Auth::user()->role_name=='Team Leader' || Auth::user()->role_name=='Trainor')
        {
          

            // $ClientEmployee = Client::all()->sortByDesc("id");
            $ClientEmployee = DB::table('clients')->get();
            $Employee = DB::table('users')->get();
            return view('usermanagement.add_newClientEmployee',compact('ClientEmployee', 'Employee'));
        }
        else
        {
            return redirect()->route('home');
        }
    }

    public function addNewClientEmployeeSave(Request $request)
     {
       

        $request->validate([
            
            'client' =>'required',
            'employee'      => 'required',
            'startDate'      => 'required',
            // 'endDate'      => 'date',

        ]);

        $data=new client_employee();

        $data->client_id         = $request->client;
        $data->user_id         = $request->employee;
        $data->client_start_date         = $request->startDate;
        $data->client_end_date         = $request->endDate;


		$data->save();
		Toastr::success('Create new client employee successfully :)','Success');
        return redirect()->route('employeeManagement');

     }
     // view detail 
     public function viewDetail($id)
     {  
        if (Auth::user()->role_name=='Admin' || Auth::user()->role_name=='Hr' || Auth::user()->role_name=='Manager' || Auth::user()->role_name=='Team Leader' || Auth::user()->role_name=='Trainor')
         {
            //  $data = DB::table('general_documents')->where('id',$id)->get();
            //  $d = DB::table('general_documents')->get();
            // $data = DB::table('users')->where('id',$id)->get();
            // $data = client_employee::join('clients', 'clients.id', '=', 'client_employees.id')
            // ->where('client_employees.id', '=', $id)
            // ->first();

            // $data = DB::table('client_employees')->where('id',$id)->get();

            // $data = client_employee::join('clients', function($join) {
            //     $join->on('clients.id', '=', 'client_employees.client_id');
            // })->where('client_employees.id',$id)->get();

            // $data = DB::table('client_employees')->where('id',$id)->get();
            
            
            // $data = client_employee::join('clients', 'clients.id', '=', 'client_employees.client_id')
            // ->join('users', 'users.id', '=', 'client_employees.employee_id')->where('client_employees.id',$id)->get();

            $data = client_employee::join('clients', 'clients.id', '=', 'client_employees.client_id')
            ->join('users', 'users.id', '=', 'client_employees.user_id')->where('client_employees.id',$id)->get();

            $ClientEmployee = DB::table('clients')->get();
            $employee = DB::table('users')->get();
            return view('usermanagement.view_clientEmployee',compact('ClientEmployee', 'employee', 'data'));
         }
         else
         {
             return redirect()->route('home');
         }
     }

     public function update(Request $request)
     {
        $request->validate([
            
            'client' =>'required',
            'employee'      => 'required',
            'startDate'      => 'required|date',
            'endDate'      => 'required|date',

        ]);

        $id           = $request->id;
        $client_id         = $request->client;
        $user_id         = $request->employee;
        $start_date         = $request->startDate;
        $end_date         = $request->endDate;

        $update = [
            'id'           => $id,
            'client_id'           => $client_id,
            'user_id'           => $user_id,
            'start_date'           => $start_date,
            'end_date'           => $end_date,
             
        ];

        client_employee::where('id',$request->id)->update($update);
        Toastr::success('Edit client employee successfully :)','Success');
        return redirect()->route('clientEmployee');
     }

     public function delete($client_employ_id)
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
        $delete = client_employee::find($client_employ_id);
        $delete->delete();
        Toastr::success('Client Employee deleted successfully :)','Success');
        return redirect()->route('clientEmployee');
    }
}
