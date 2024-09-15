<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('if_auth_admin')->except('logout');
    }

    public function index(){
        return view('admin.auth.login');
    }
    public function store(Request $request){
        $request->validate([
            'email'         => ['required','email','exists:admins,email'],
            'password'      => ['required','string'],
            'remember_me'   => ['string','in:remember'],
        ]);
        $data = $request->only('email','password');
        if(Auth::guard('admin')->attempt($data,$request->remember_me)){
            return redirect()->route('admin.dashboard.index');
        }else{
            return redirect()->back()->withInput(['email' => $request->email])->with('errorMessage',"These credentials don't much our records");
        }
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.dashboard.login');
    }

}
