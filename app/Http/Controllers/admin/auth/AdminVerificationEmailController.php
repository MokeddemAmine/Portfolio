<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use App\Mail\UserRegistered;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminVerificationEmailController extends Controller
{
    public function verify_email(){
        return view('admin.auth.verify');
    }
    public function verify_email_resend(Request $request){
        
        $user = Auth::guard('admin')->user();
        Mail::to($user->email)->send(new UserRegistered($user));

        return redirect()->back()->with('resent');
    }
    
    public function verify_email_send($user_id,$user_email,$user_created_at){
        
        $user = Admin::find($user_id);
        
        if($user->email == $user_email && $user->created_at->format('Y-m-d H:i:s') == $user_created_at){
            
            if(!$user->email_verified_at){
                $user->update([
                    'email_verified_at'     => Carbon::now(),
                ]);
            }
        }
        return redirect()->route('admin.dashboard.index');
    }
}
