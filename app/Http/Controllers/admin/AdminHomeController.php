<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
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
    public function app_chat(){
        return view('admin.app-chat');
    }
    public function mail_inbox(){
        return view('admin.mail-inbox');
    }
    public function page_404(){
        return view('admin.page.404');
    }
    public function page_500(){
        return view('admin.page.500');
    }
    public function account_settings(){
        return view('admin.page.account-settings');
    }
    public function clients(){
        return view('admin.page.clients');
    }
    public function coming_soon(){
        return view('admin.page.coming-soon');
    }
    public function contacts(){
        return view('admin.page.contacts');
    }
    public function employees(){
        return view('admin.page.employees');
    }
    public function faq(){
        return view('admin.page.faq');
    }
    public function file_manager(){
        return view('admin.page.file-manager');
    }
    public function gellery(){
        return view('admin.page.gallery');
    }
    public function pricing(){
        return view('admin.page.pricing');
    }
    public function task_list(){
        return view('admin.page.task-list');
    }
}
