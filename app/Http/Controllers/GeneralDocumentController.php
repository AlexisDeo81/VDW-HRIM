<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;



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



class GeneralDocumentController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_name=='Admin' || Auth::user()->role_name=='Hr' || Auth::user()->role_name=='Manager' || Auth::user()->role_name=='Team Leader' || Auth::user()->role_name=='Trainor')
        {
            $data = DB::table('general_documents')->get();
            return view('usermanagement.generalDocument_control',compact('data'));
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
            $data = DB::table('general_documents')->where('id',$id)->get();
            $d = DB::table('general_documents')->get();
            return view('usermanagement.view_generalDocuments',compact('data', 'd'));
        }
        else
        {
            return redirect()->route('home');
        }
    }
    

    // add new user
    public function addNewGeneralDocument()
    {
        return view('usermanagement.add_new_GeneralDocument');
    }

    public function addNewGDocsSave(Request $request)
     {
       
        // $path = time().'.'.$request->path->getClientOriginalExtension();  
        // $request->path->move(public_path('files'), $path);
        
        // $gDocs = new GeneralDocument;

        // $gDocs->path         = $request->path;
        // $gDocs->name         = $request->name;
        // $gDocs->extension         = $request->extension;
        // $gDocs->show_to_employees         = $request->show_to_employees;
        // $gDocs->uploaded_by         = $request->uploaded_by;


        // $gDocs->save();
       
        // Toastr::success('Create new file successfully :)','Success');
        // return redirect()->route('generalDocuments');


        $request->validate([
            // 'path' => 'required|csv,txt,xlx,xls,pdf|max:2048',
            'path' =>'required|mimes:xls,xlsx,pdf',
            'name'      => 'required|string|max:255',
            'show_to_employees'      => 'required',
            'type'      => 'required',

        ]);

        $data=new GeneralDocument();

		$path=$request->path;
		        
	    $filename=time().'.'.$path->getClientOriginalExtension();

        $extension = $request->path->extension();

		$request->path->move('files',$filename);

		$data->path=$filename;

       
		$data->name=$request->name;

        $data->extension         = $extension;
        $data->show_to_employees         = $request->show_to_employees;
        $data->type         = $request->type;
        $data->uploaded_by         = $request->uploaded_by;
		

		$data->save();
		Toastr::success('Create new file successfully :)','Success');
        return redirect()->route('generalDocuments');

     }

     public function download(Request $request,$path)
     {
       return response()->download(public_path('files/'.$path));
     }

     // update
     public function update(Request $request)
     {
        $request->validate([
            // 'path' => 'required|csv,txt,xlx,xls,pdf|max:2048',
            'path' =>'required|mimes:xls,xlsx,pdf',
            'name'      => 'required|string|max:255',
            // 'show_to_employees'      => 'required',
            // 'type'      => 'required',

        ]);

        $path=$request->path;
	    $filename=time().'.'.$path->getClientOriginalExtension();
        $extension = $request->path->extension();
		$request->path->move('files',$filename);

        
        $id           = $request->id;

        $path=$filename;
        $name           = $request->name;
        $extension         = $extension;
        $show_to_employees           = $request->show_to_employees;
        $type           = $request->type;

        $dt       = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();
        
        $update = [
            'id'           => $id,
            'path'           => $path,
            'name'           => $name,
            'extension'           => $extension,
            'show_to_employees'           => $show_to_employees,
            'type'           => $type,
        ];
        
        GeneralDocument::where('id',$request->id)->update($update);
        Toastr::success('Client updated successfully :)','Success');
        return redirect()->route('generalDocuments');
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

        $delete = GeneralDocument::find($id);
        
        $delete->delete();
        Toastr::success('Document deleted successfully :)','Success');
        return redirect()->route('generalDocuments');
    }
     
     
}
