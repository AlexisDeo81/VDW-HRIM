<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Models\User;
use App\Models\Form;
use App\Rules\MatchOldPassword;
use Carbon\Carbon;
use Session;
use Auth;
use Hash;

class EmployeeManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role_name=='Admin' || Auth::user()->role_name=='Hr' || Auth::user()->role_name=='Manager' || Auth::user()->role_name=='Team Leader' || Auth::user()->role_name=='Trainor')
        {
            $data = DB::table('users')->get();
            return view('usermanagement.employee_control',compact('data'));
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
            $data = DB::table('users')->where('id',$id)->get();
            $roleName = DB::table('role_type_users')->get();
            $userStatus = DB::table('user_types')->get();
            return view('usermanagement.view_users',compact('data','roleName','userStatus'));
        }
        else
        {
            return redirect()->route('home');
        }
    }

    // use activity log
    public function activityLog()
    {
        $activityLog = DB::table('user_activity_logs')->get();
        return view('usermanagement.user_activity_log',compact('activityLog'));
    }
    // activity log
    public function activityLogInLogOut()
    {
        $activityLog = DB::table('activity_logs')->get();
        return view('usermanagement.activity_log',compact('activityLog'));
    }
    
    // profile user
    public function profile()
    {
        return view('usermanagement.profile_user');
    }
    
    // add new user
    public function addNewUser()
    {
        return view('usermanagement.add_new_user',compact('data'));
    }
    
     // save new user
     public function addNewUserSave(Request $request)
     {
    
        $request->validate([
            'first_name'      => 'required|string|max:255',
            'middle_name'      => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'line_manager'      => 'required|string',
            'maxicare_card_number'      => 'required',
            'maxicare_policy_number'      => 'required',
            'job_title'      => 'required|string',
            'job_status'      => 'required|string',
            'status'      => 'required|string',
            'role_name' => 'required|string|max:255',
            'start_date'      => 'date',
            'end_date'      => 'date',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:7|confirmed',
            'password_confirmation' => 'required',
        ]);

        $image = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $image);

        $user = new User;
        $user->first_name         = $request->first_name;
        $user->middle_name         = $request->middle_name;
        $user->last_name         = $request->last_name;
        $user->line_manager         = $request->line_manager;
        $user->maxicare_card_number         = $request->maxicare_card_number;
        $user->maxicare_policy_number         = $request->maxicare_policy_number;
        $user->job_title         = $request->job_title;
        $user->job_status         = $request->job_status;
        $user->status         = $request->status;
        $user->avatar       = $image;
        $user->email        = $request->email;
        $user->start_date        = $request->start_date;
        $user->end_date        = $request->end_date;
        $user->role_name    = $request->role_name;
        $user->password     = Hash::make($request->password);
 
        $user->save();

        Toastr::success('Create new account successfully :)','Success');
        return redirect()->route('userManagement');
    }
    
    // update
    public function update(Request $request)
    {
        $id           = $request->id;
        $first_name     = $request->first_name;
        $middle_name     = $request->middle_name;
        $last_name     = $request->last_name;
        $line_manager     = $request->line_manager;
        $maxicare_card_number     = $request->maxicare_card_number;
        $maxicare_policy_number     = $request->maxicare_policy_number;
        $job_title     = $request->job_title;
        $job_status     = $request->job_status;
        $status     = $request->status;
        $avatar     = $request->avatar;
        $email     = $request->email;
        $start_date     = $request->start_date;
        $end_date     = $request->end_date;
        $role_name     = $request->role_name;
        

        $dt       = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();
        
        $old_image = User::find($id);

        $image_name = $request->hidden_image;
        $image = $request->file('image');

        if($old_image->avatar=='photo_defaults.jpg')
        {
            if($image != '')
            {
                $image_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $image_name);
            }
        }
        else{
            
            if($image != '')
            {
                $image_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $image_name);
                unlink('images/'.$old_image->avatar);
            }
        }
        
        
        $update = [

            'id'           => $id,
            'avatar'       => $image_name,
            'first_name'           => $first_name,
            'middle_name'           => $middle_name,
            'last_name'           => $last_name,
            'line_manager'           => $line_manager,
            'maxicare_card_number'           => $maxicare_card_number,
            'maxicare_policy_number'           => $maxicare_policy_number,
            'job_title'           => $job_title,
            'job_status'           => $job_status,
            'status'           => $status,
            'email'           => $email,
            'start_date'           => $start_date,
            'end_date'           => $end_date,
            'role_name'           => $role_name,
            
        ];

        $activityLog = [

            'user_name'    => $first_name + $last_name,
            'email'        => $email,
            'status'       => $status,
            'role_name'    => $role_name,
            'modify_user'  => 'Update',
            'date_time'    => $todayDate,
        ];

        DB::table('user_activity_logs')->insert($activityLog);
        User::where('id',$request->id)->update($update);
        Toastr::success('User updated successfully :)','Success');
        return redirect()->route('userManagement');
    }
    // delete
    public function delete($id)
    {
        $user = Auth::User();
        Session::put('user', $user);
        $user=Session::get('user');

        $fNmae     = $user->first_name;
        $LName     = $user->last_name;
        $email        = $user->email;
        $phone_number = $user->phone_number;
        $status       = $user->status;
        $role_name    = $user->role_name;

        $dt       = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();

        $activityLog = [

            'user_name'    => $fNmae + $LName,
            'email'        => $email,
            'phone_number' => $phone_number,
            'status'       => $status,
            'role_name'    => $role_name,
            'modify_user'  => 'Delete',
            'date_time'    => $todayDate,
        ];

        DB::table('user_activity_logs')->insert($activityLog);

        $delete = User::find($id);
        unlink('images/'.$delete->avatar);
        $delete->delete();
        Toastr::success('User deleted successfully :)','Success');
        return redirect()->route('userManagement');
    }

    // view change password
    public function changePasswordView()
    {
        return view('usermanagement.change_password');
    }
    
    // change password in db
    public function changePasswordDB(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        Toastr::success('User change successfully :)','Success');
        return redirect()->route('home');
    }
}
