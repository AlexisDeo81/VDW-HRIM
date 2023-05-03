<?php

namespace App\Http\Controllers;

use App\Models\client_employee;
use App\Models\EmployeeDocument;
use App\Models\EmployeeNotes;
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


class UserManagementController extends Controller
{
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
            // $client =User::join('clients', function($join) {
            //     $join->on('clients.id', '=', 'users.client_id');
            // })->get();

            $timeLine = User::join('employee_notes', function($join) {
                $join->on('employee_notes.user_id', '=', 'users.id');
            })->where('user_id',$id)->get();

            $employee_document = User::join('employee_documents', function($join) {
                $join->on('employee_documents.user_id', '=', 'users.id');
            })->where('user_id',$id)->get();

            $pastClient = client_employee::join('clients', function($join) {
                $join->on('client_employees.client_id', '=', 'clients.id');
            })->where('user_id',$id)->get();

            // $pastClient = client_employee::join('clients', 'clients.id', '=', 'client_employees.client_id')
            // ->join('users', 'users.id', '=', 'client_employees.user_id')->where('user_id',$id)->get();

            
            
            // $client = User::join('clients', 'clients.id', '=', 'users.id')->where('users.id',$id)->get();
            $client_list = DB::table('clients')->get();
            // $employee_document = User::join('employee_documents', 'employee_documents.user_id', '=', 'users.id')->where('employee_document.id',$id)->get();
            // $employee_document = EmployeeDocument::join('users', 'users.id', '=', 'employee_documents.user_id')->where('employee_documents.id',$id)->get();
            $data = DB::table('users')->where('id',$id)->get();
            $dataLineManager = DB::table('line_managers')->where('id',$id)->get();
            $roleName = DB::table('role_type_users')->get();
            $jobStatus = DB::table('job_statuses')->get();
            $userStatus = DB::table('user_types')->get();
            $lineManager = DB::table('line_managers')->get();
            // return view('usermanagement.view_users',compact('data', 'dataLineManager' ,'roleName', 'jobStatus', 'userStatus', 'lineManager','client','employee_document','client_list', 'pastClient', 'timeLine'));
            return view('usermanagement.view_users',compact('data', 'dataLineManager' ,'roleName', 'jobStatus', 'userStatus', 'lineManager','client_list', 'employee_document', 'pastClient', 'timeLine'));
        }
        else
        {
            return redirect()->route('home');
        }
    }
    public function viewDetail2($id)
    {  
        if (Auth::user()->role_name=='Admin' || Auth::user()->role_name=='Hr' || Auth::user()->role_name=='Manager' || Auth::user()->role_name=='Team Leader' || Auth::user()->role_name=='Trainor')
        {
            // $client =User::join('clients', function($join) {
            //     $join->on('clients.id', '=', 'users.client_id');
            // })->get();

            $timeLine = User::join('employee_notes', function($join) {
                $join->on('employee_notes.user_id', '=', 'users.id');
            })->get();
            
            $pastClient = client_employee::join('clients', function($join) {
                $join->on('client_employees.client_id', '=', 'clients.id');
            })->where('client_employees.user_id',$id)->get();

            // $pastClient = client_employee::join('clients', 'clients.id', '=', 'client_employees.client_id')
            // ->join('users', 'users.id', '=', 'client_employees.user_id')->where('user_id',$id)->get();

            

            $client = User::join('clients', 'clients.id', '=', 'users.id')->where('users.id',$id)->get();
            $client_list = DB::table('clients')->get();
            // $employee_document = User::join('employee_documents', 'employee_documents.id', '=', 'users.employee_document_id')->where('users.id',$id)->get();
            $data = DB::table('users')->where('id',$id)->get();
            $dataLineManager = DB::table('line_managers')->where('id',$id)->get();
            $roleName = DB::table('role_type_users')->get();
            $jobStatus = DB::table('job_statuses')->get();
            $userStatus = DB::table('user_types')->get();
            $lineManager = DB::table('line_managers')->get();
            return view('usermanagement.view_clients_tab_panel',compact('data', 'dataLineManager' ,'roleName', 'jobStatus', 'userStatus', 'lineManager','client','employee_document','client_list', 'pastClient', 'timeLine'));
        }
        else
        {
            return redirect()->route('home');
        }
    }

    public function viewDetailDocument($id)
    {  
        if (Auth::user()->role_name=='Admin' || Auth::user()->role_name=='Hr' || Auth::user()->role_name=='Manager' || Auth::user()->role_name=='Team Leader' || Auth::user()->role_name=='Trainor')
        {
            // $employee_document = User::join('employee_documents', 'employee_documents.id', '=', 'users.employee_document_id')->where('employee_documents.id',$id)->get();
            $employee_document = EmployeeDocument::join('users', 'users.id', '=', 'employee_documents.user_id')->where('employee_documents.id',$id)->get();

            return view('usermanagement.view_employeeEditDocument',compact('employee_document'));
        }   
        else
        {   
            return redirect()->route('home');
        }
    }

    public function viewDetailEmployNotes($id)
    {  
        if (Auth::user()->role_name=='Admin' || Auth::user()->role_name=='Hr' || Auth::user()->role_name=='Manager' || Auth::user()->role_name=='Team Leader' || Auth::user()->role_name=='Trainor')
        {
            $timeLine = User::join('employee_notes', function($join) {
                $join->on('employee_notes.user_id', '=', 'users.id');
            })->get();
            $timeList = DB::table('employee_notes')->where('id',$id)->get();
            return view('usermanagement.view_editEmployeeNotes',compact('timeLine','timeList'));
        }
        else
        {
            return redirect()->route('home');
        }
    }
    public function updateEmployNotes(Request $request)
    { 

        $request->validate([
            'notes' => 'required|string|max:255',
        ]);

        $id           = $request->id;
        $user_id           = $request->user_id;
        $notes           = $request->notes;
        
        $update = [
            'id'           => $id,
            'user_id'           => $user_id,
            'notes'           => $notes,
        ];

        EmployeeNotes::where('id',$request->id)->update($update);
        Toastr::success('Employee notes updated successfully :)','Success');
        return redirect()->route('userManagement');
    }

    public function deleteEmployeeNotes($id)
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

        $delete = EmployeeNotes::find($id);
        $delete->delete();
        Toastr::success('Employee notes deleted successfully :)','Success');
        return redirect()->route('userManagement');
    }




    public function viewSkillset($id)
    {  
        if (Auth::user()->role_name=='Admin' || Auth::user()->role_name=='Hr' || Auth::user()->role_name=='Manager' || Auth::user()->role_name=='Team Leader' || Auth::user()->role_name=='Trainor')
        {
            $data = DB::table('users')->where('id',$id)->get();
            return view('usermanagement.view_skillset_detail',compact('data'));
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
        $userLevel = DB::table('role_type_users')->get();
        $jobStatus = DB::table('job_statuses')->get();
        $employStat = DB::table('user_types')->get();
        $lineManager = DB::table('line_managers')->get();
        return view('usermanagement.add_new_user',compact('lineManager', 'employStat', 'jobStatus', 'userLevel'));
    }
     // save new user
     public function addNewUserSave(Request $request)
     {

        $request->validate([
            'image' => 'required',
            'first_name'      => 'required',
            'first_name'      => 'required|string|max:255',
            // 'middle_name'      => 'string|max:255',
            'last_name'      => 'required|string|max:255',
            'line_manager'      => 'required|string',
            // 'maxicare_card_number'      => 'required',
            // 'maxicare_policy_number'      => 'required',
            'job_title'      => 'required|string',
            'job_status'      => 'required|string',
            'status'      => 'required|string',
            'role_name' => 'required|string|max:255',
            'start_date'      => 'required|date',
            // 'end_date'      => 'date',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:7|confirmed',
            'password_confirmation' => 'required',
            // 'notes' => 'required',
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
        $user->notes    = $request->notes;
        $user->password     = Hash::make($request->password);
       
 
        $user->save();

        Toastr::success('Create new account successfully :)','Success');
        return redirect()->route('userManagement');
    }
    
    // update
    public function update(Request $request)
    {

        // $validator = Validator::make($request->all(), [
        //     'image' => 'required',
        //     'first_name'      => 'required|string|max:255',
        //     'middle_name'      => 'required|string|max:255',
        //     'last_name'      => 'required|string|max:255',
        //     'line_manager'      => 'required|string',
        //     'maxicare_card_number'      => 'required',
        //     'maxicare_policy_number'      => 'required',
        //     'job_title'      => 'required|string',
        //     'job_status'      => 'required|string',
        //     'status'      => 'required|string',
        //     'role_name' => 'required|string|max:255',
        //     'start_date'      => 'date',
        //     'end_date'      => 'date',
        //     'email'     => 'required|string|email|max:255|unique:users',
        //     'password'  => 'required|string|min:7|confirmed',
        //     'password_confirmation' => 'required',
        //     'notes'      => 'required|string|max:255',
        // ]);
        // $id           = $request->id;

        // if ($validator->fails()) {
        //     return redirect()
        //         ->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        // $user = User::find($id);
        // $user->first_name = $request->input('first_name');
        // $user->save();
        //  Toastr::success('User updated successfully :)','Success');
        // return redirect()->route('userManagement');

          $request->validate([
            'image' => 'required',
            'first_name'      => 'required|string|max:255',
            // 'middle_name'      => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'email'     => 'required',
            
            'line_manager'      => 'required|string',
            // 'maxicare_card_number'      => 'required',
            // 'maxicare_policy_number'      => 'required',
            'job_title'      => 'required|string',

            'job_status'      => 'required|string',
            'status'      => 'required|string',
            'role_name' => 'required|string|max:255',
            
            'start_date'      => 'required',
            // 'password'  => 'required|string|min:7|confirmed',
            // 'password_confirmation' => 'required',
            // 'notes' => 'required',
        ]);
        
    


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
        $notes     = $request->notes;
        

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
            'notes'           => $notes,
            
        ];

        $activityLog = [

            'user_name'    => $first_name,
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

    public function updateClientEmploy(Request $request)
    
    {

        $id           = $request->id;

        $client_id         = $request->client;
        $client_start_date         = $request->client_start_date;
        $client_end_date         = $request->client_end_date;


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
       
            'client_id'           => $client_id,
            'client_start_date'           => $client_start_date,
            'client_end_date'           => $client_end_date,

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

            'user_name'    => $first_name,
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


    public function updateEmploySkillset(Request $request)
    
    {

        $request->validate([
            'link_to_skills' => 'required',
        ]);



        $id           = $request->id;

        // $client_id         = $request->client;
       


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
        $link_to_skills     = $request->link_to_skills;


        $update_dt = date("Y-m-d H:i:s");
        $skills_last_modified_date     = $update_dt;
        

        $dt       = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();
        
        $old_image = User::find($id);

        $image_name = $request->hidden_image;
        


        
        
        $update = [

            'id'           => $id,
       
            // 'client_id'           => $client_id,
        

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
            'link_to_skills'           => $link_to_skills,
            'skills_last_modified_date'           => $skills_last_modified_date,
        ];

        $activityLog = [
            'user_name'    => $first_name,
            'email'        => $email,
            'status'       => $status,
            'role_name'    => $role_name,
            'modify_user'  => 'Update',
            'date_time'    => $todayDate,
        ];

        DB::table('user_activity_logs')->insert($activityLog);
        User::where('id',$request->id)->update($update);
        Toastr::success('Skillset updated successfully :)','Success');
        return redirect()->route('userManagement');
    }


    public function viewDetailEmployDocuments($id)
    {
        if (Auth::user()->role_name=='Admin' || Auth::user()->role_name=='Hr' || Auth::user()->role_name=='Manager' || Auth::user()->role_name=='Team Leader' || Auth::user()->role_name=='Trainor')
        {
            // $employeDocuments = User::join('employee_notes', function($join) {
            //     $join->on('employee_notes.user_id', '=', 'users.id');
            // })->get();
            $employeDocuments = DB::table('employee_documents')->where('id',$id)->get();
            // $data = DB::table('users')->where('id',$id)->get();
            return view('usermanagement.view_employeeEditDocument',compact('employeDocuments'));
        }
        else
        {
            return redirect()->route('home');
        }
    }


    public function updateDocumentEmploy(Request $request)
    
    {


        $id           = $request->id;


        $path=$request->path;
        
        $filename=time().'.'.$path->getClientOriginalExtension();

        $extension = $request->path->extension();

        $request->path->move('files',$filename);



        $employee_id         = $request->client;
        $path         = $request->client_start_date;
        $name         = $request->client_end_date;
        $extension         = $request->client_end_date;

        $show_to_employee         = $request->client_end_date;

        $uploaded_by         = $request->client_end_date;
        $type         = $request->type;



        $update = [

            'id'           => $id,
            'employee_id'           => $employee_id,
            'path'           => $path,
            'name'           => $name,
            'extension'           => $extension,
            'show_to_employee'           => $show_to_employee,
            'uploaded_by'           => $uploaded_by,
            'type'           => $type,
            
        ];
        
        EmployeeDocument::where('employee_id',$request->id)->update($update);



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

        $delete = User::find($id);
        unlink('images/'.$delete->avatar);
        $delete->delete();
        Toastr::success('User deleted successfully :)','Success');
        return redirect()->route('userManagement');
    }
    // delete
    public function deleteClientEmployee($id)
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

        $delete = client_employee::find($id);
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

    // // add new client_employee
    // public function addNewClientEmployee()
    // {
    
    // if (Auth::user()->role_name=='Admin')
    //     {
          

    //         // $ClientEmployee = Client::all()->sortByDesc("id");
    //         $ClientEmployee = DB::table('clients')->get();
    //         $Employee = DB::table('users')->get();
    //         return view('usermanagement.view_users.blade',compact('ClientEmployee', 'Employee'));
    //     }
    //     else
    //     {
    //         return redirect()->route('home');
    //     }
    // }

    public function addNewClientEmployeeSave(Request $request)
     {
       

        $request->validate([
            
            'client' =>'required',
            'employee'      => 'required',
            'startDate'      => 'required|date',
            'endDate'      => 'date',

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

     public function addNotes(Request $request)
    {
        $request->validate([
            'notes' => 'required',
        ]);


            
        $employeeNote = new EmployeeNotes;
        $employeeNote->user_id = $request->id;
        $employeeNote->notes = $request->notes;
        $employeeNote->save();

        return redirect()->route('userManagement');
    }
}









