<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use App\Mail\UserRegistered;
use App\Models\Admin;
use App\Models\AuthAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminRegisterController extends Controller
{
    public function index(){
        return view('admin.auth.register');
    }
    public function store(Request $request){
        
        $request->validate([
            'admin_key'             => ['required','string','exists:auth_admins,password'],
            'first_name'            => ['required','string'],
            'last_name'             => ['required','string'],
            'email'                 => ['required','email','unique:admins'],
            'password'              => ['required','string','min:8','confirmed'],
            'password_confirmation' => ['required','string','min:8'],
            'terms_conditions'      => ['required','in:agree'],
        ]);

        $user = Admin::create([
            'name'      => $request->first_name.' '.$request->last_name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        Mail::to($user->email)->send(new UserRegistered($user));
        
        return redirect()->route('admin.login')->with('successMessage','Your Registration is setting successfully');
    }
}
