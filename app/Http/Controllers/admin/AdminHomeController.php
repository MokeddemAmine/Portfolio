<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Home;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{
    public function __construct()
    {
        
    }
    public function index(){
        return view('admin.index');
    }
    public function mail_inbox(){
        $messages = Message::orderBy('created_at','desc')->get();
        return view('admin.mail-inbox',compact('messages'));
    }
    public function account_settings(){
        $blogs_count = Blog::all()->count();
        $admin = Auth::guard('admin')->user();
        $messages = Message::all()->count();
        $brand = Home::where('section','website')->first();
        return view('admin.account-settings',compact('admin','messages','brand','blogs_count'));
    }
}
