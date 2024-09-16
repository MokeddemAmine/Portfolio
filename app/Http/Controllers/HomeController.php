<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Resume;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $home = Home::where('section','home')->first();
        $about = Home::where('section','about')->first();
        $contact = Home::where('section','contact')->first();
        $resume = Resume::all();
        return view('index',compact('home','about','contact','resume'));
    }
}
