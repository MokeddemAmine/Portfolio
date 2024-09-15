<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\Models\Admin;
use App\Models\PasswordResetToken;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminPasswordController extends Controller
{
    public function forgot_password(){
        return view('admin.auth.passwords.email');
    }
    public function reset_password(Request $request){
        $request->validate([
            'email'     => ['required','email','exists:admins,email'],
        ]);

        $token = Str::random(60);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]
        );

        Mail::to($request->email)->send(new ResetPassword($token,$request->email));

        return redirect()->back()->with('successMessage', 'Password reset link has been sent to your email!');
    }

    public function edit($mail,$token){
        $verify_token = PasswordResetToken::where('email',$mail)->where('token',$token)->first();
        if($verify_token){
            return view('admin.auth.passwords.reset',compact('mail','token'));
        }
    }

    public function password_update(Request $request){
        $request->validate([
            'email'                 => ['required','email','exists:password_reset_tokens,email'],
            'token'                 => ['required','string','min:60','exists:password_reset_tokens,token'],
            'password'              => ['required','string','min:8','confirmed'],
            'password_confirmation' => ['required','string','min:8'],
        ]);

        $admin = Admin::where('email',$request->email)->first();
        if($admin){
            $admin->update([
                'password'  => Hash::make($request->password),
            ]);
            // delete the token where the password was reset
            PasswordResetToken::where('email',$admin->email)->first()->delete();
            // redirect to a special page
            if(Auth::guard('admin')->user() && Auth::guard('admin')->user()->email == $admin->email){
                return redirect()->route('admin.dashboard.index')->with('successMessage','password reset with success');
            }else{
                return redirect()->route('admin.dashboard.login')->with('successMessage','password reset with success');
            }
            
        }
        else{
            return redirect()->back()->with('errorMessage','something was wrong');
        }
    }
}
