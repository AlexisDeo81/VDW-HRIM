<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function storeUser(Request $request)
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

        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'role_name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => ['required', 'confirmed', Password::min(8)
        //             ->mixedCase()
        //             ->letters()
        //             ->numbers()
        //             ->symbols()
        //             ->uncompromised(),
        //     'password_confirmation' => 'required',
        //     ],
        // ]);
        
        User::create([
            'first_name'      => $request->first_name,
            'middle_name'      => $request->middle_name,
            'last_name'      => $request->last_name,
            'line_manager'      => $request->line_manager,
            'maxicare_card_number'      => $request->maxicare_card_number,
            'maxicare_policy_number'      => $request->maxicare_policy_number,
            'job_title'      => $request->job_title,
            'job_status'      => $request->job_status,
            'status'      => $request->status,
            'avatar'    => $request->image,
            'email'     => $request->email,
            'start_date'     => $request->start_date,
            'end_date'     => $request->end_date,
            'role_name' => $request->role_name,
            'password'  => Hash::make($request->password),
        ]);
        Toastr::success('Create new employee successfully :)','Success');
        return redirect('login');
    }
}
