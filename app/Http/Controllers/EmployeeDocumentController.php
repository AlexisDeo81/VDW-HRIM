<?php

namespace App\Http\Controllers;

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

class EmployeeDocumentController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_name=='Admin' || Auth::user()->role_name=='Hr' || Auth::user()->role_name=='Manager' || Auth::user()->role_name=='Team Leader' || Auth::user()->role_name=='Trainor')
        {
            // $data = DB::table('employee_documents')->get();
            $data = User::join('employee_documents', function($join) {
                $join->on('employee_documents.user_id', '=', 'users.id');
            })->get();
            return view('usermanagement.employeeDocument_control',compact('data'));
        }
        else
        {
            return redirect()->route('home');
        }
        
    }

    // add new user
    public function addNewEmployeeDocument()
    {
    
        if (Auth::user()->role_name=='Admin' || Auth::user()->role_name=='Hr' || Auth::user()->role_name=='Manager' || Auth::user()->role_name=='Team Leader' || Auth::user()->role_name=='Trainor')
        {
          ;

            $employee = User::all()->sortByDesc("id");
            
            return view('usermanagement.add_new_EmployeeDocument',compact('employee'));
        }
        else
        {
            return redirect()->route('home');
        }
    }

    public function addNewEDocsSave(Request $request)
     {

        $request->validate([
            // 'path' => 'required|csv,txt,xlx,xls,pdf|max:2048',
            'path' =>'required|mimes:xls,xlsx,pdf,docx',
            'name'      => 'required|string|max:255',
            'show_to_employees'      => 'required',
            'type'      => 'required',
            'user_name'      => 'required',
        ]);
    

        $data=new EmployeeDocument();
   	
   	  
		$path=$request->path;
		        
	    $filename=time().'.'.$path->getClientOriginalExtension();

        $extension = $request->path->extension();

		$request->path->move('files',$filename);
        
		$data->path=$filename;
		$data->name=$request->name;
		$data->user_id=$request->user_name;

        $data->extension         = $extension;
        $data->show_to_employee         = $request->show_to_employees;
        $data->type         = $request->type;
        $data->uploaded_by         = $request->uploaded_by;
		

		$data->save();
		Toastr::success('Create new file successfully :)','Success');
        return redirect()->route('employeeDocuments');
        
     }

     public function download(Request $request,$path)
     {
       return response()->download(public_path('files/'.$path));
     }

         // view detail 
    public function viewDetail($id)
    {  
        if (Auth::user()->role_name=='Admin' || Auth::user()->role_name=='Hr' || Auth::user()->role_name=='Manager' || Auth::user()->role_name=='Team Leader' || Auth::user()->role_name=='Trainor')
        {
            $employee = User::all()->sortByDesc("id");
            $employee_document = DB::table('employee_documents')->where('id',$id)->get();
            $d = DB::table('employee_documents')->get();
            return view('usermanagement.view_employeeDocument',compact('employee_document', 'd', 'employee'));
        }
        else
        {
            return redirect()->route('home');
        }
    }

    public function updateEmployeeDocs(Request $request)
    {

        $request->validate([
            // 'path' => 'required|csv,txt,xlx,xls,pdf|max:2048',
            'path' =>'required|mimes:xls,xlsx,pdf',
            'name'      => 'required|string|max:255',
            // 'employee_name'      => 'required|string|max:255',
            // 'show_to_employees'      => 'required',
            'type'      => 'required',
        ]);


        $path=$request->path;
	    $filename=time().'.'.$path->getClientOriginalExtension();
        $extension = $request->path->extension();
		$request->path->move('files',$filename);


        $id           = $request->id;

        $path=$filename;
		$name=$request->name;
		$user_id=$request->user_id;

        $extension         = $extension;
        $show_to_employee         = $request->show_to_employee;
        $uploaded_by         = $request->uploaded_by;
        $type         = $request->type;
        // $name           = $request->name;
        // $show_to_employees           = $request->show_to_employees;
        // $type           = $request->type;

        
        $update = [
            'id'           => $id,
            'user_id'           => $user_id,
            'path'           => $path,
            'name'           => $name,
            'extension'           => $extension,
            'show_to_employee'           => $show_to_employee,
            'uploaded_by'           => $uploaded_by,
            'type'           => $type,
        ];

        EmployeeDocument::where('id',$request->id)->update($update);
        Toastr::success('Employee Document updated successfully :)','Success');
        return redirect()->route('employeeDocuments');
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

        $delete = EmployeeDocument::find($id);

        $delete->delete();
        Toastr::success('Document deleted successfully :)','Success');
        return redirect()->route('employeeDocuments');
    }

}
