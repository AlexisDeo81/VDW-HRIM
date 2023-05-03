<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Models\User;
use App\Models\Clients;
use App\Models\Form;
use App\Rules\MatchOldPassword;
use Carbon\Carbon;
use Session;
use Auth;
use Hash;
class ClientManagementController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_name=='Admin' || Auth::user()->role_name=='Hr' || Auth::user()->role_name=='Manager' || Auth::user()->role_name=='Team Leader' || Auth::user()->role_name=='Trainor')
        {
            $data = DB::table('clients')->get();
            return view('usermanagement.client_control',compact('data'));
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
            $data = DB::table('clients')->where('id',$id)->get();
            $userStatus = DB::table('user_types')->get();
            return view('usermanagement.view_clients',compact('data', 'userStatus'));
        }
        else
        {
            return redirect()->route('home');
        }
    }

    // add new user
    public function addNewClient()
    {
        return view('usermanagement.add_new_client');
    }

    public function addNewClientSave(Request $request)
     {
        $request->validate([
            'fname'      => 'required|string|max:255',
            'lname'      => 'required|string|max:255',
            'email_address'     => 'required|string|email|max:255|unique:clients',
            // 'skype'      => 'string|max:255',
            // 'company_name'      => 'string|max:255',
            // 'job_description'      => 'string|max:255',
            'status'      => 'required',
            // 'notes'      => 'required',
            'start_date'      => 'date',
            // 'end_date'      => 'date',
        ]);
 
        $client = new Clients;
        $client->fname         = $request->fname;
        $client->lname         = $request->lname;
        $client->email_address         = $request->email_address;
        $client->skype         = $request->skype;
        $client->company_name         = $request->company_name;
        $client->job_description         = $request->job_description;
        $client->status         = $request->status;
        $client->start_date         = $request->start_date;
        $client->end_date         = $request->end_date;
        $client->notes         = $request->notes;

        $client->save();

        Toastr::success('Create new client successfully :)','Success');
        return redirect()->route('clientManagement');
     }

     // update
    public function update(Request $request)
    {


        $user = Auth::User();
        Session::put('user', $user);
        $user=Session::get('user');


        $request->validate([
            'fname'      => 'required|string|max:255',
            'lname'      => 'required|string|max:255',
            'email_address'     => 'required|string|email|max:255',
            // 'skype'      => 'string|max:255',
            // 'company_name'      => 'string|max:255',
            // 'job_description'      => 'string|max:255',
            'status'      => 'required',
            // 'notes'      => 'required',
            'start_date'      => 'date',
            // 'end_date'      => 'date',
            
        ]);

        $roleName       = $user->role_name;

        $id           = $request->id;
        $fname     = $request->fname;
        $lname     = $request->lname;
        $email_address     = $request->email_address;
        $skype     = $request->skype;
        $company_name     = $request->company_name;
        $job_description     = $request->job_description;
        $status     = $request->status;
        $start_date     = $request->start_date;
        $end_date     = $request->end_date;
        $notes     = $request->notes;


        $dt       = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();
        
        
        $update = [
            'id'           => $id,
            'fname'           => $fname,
            'lname'           => $lname,
            'email_address'           => $email_address,
            'skype'           => $skype,
            'company_name'           => $company_name,
            'job_description'           => $job_description,
            'status'           => $status,
            'start_date'           => $start_date,
            'end_date'           => $end_date,
            'notes'           => $notes,
        ];

        $activityLog = [

            'user_name'    => $fname,
            'email'        => $email_address,
            'status'       => $status,
            'role_name'    => $roleName,
            'modify_user'  => 'Update',
            'date_time'    => $todayDate,
        ];

        DB::table('user_activity_logs')->insert($activityLog);
        Clients::where('id',$request->id)->update($update);
        Toastr::success('Client updated successfully :)','Success');
        return redirect()->route('clientManagement');
    }


}
