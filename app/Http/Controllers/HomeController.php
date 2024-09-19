<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Message;
use App\Models\Portfolio;
use App\Models\project;
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
        $portfolio = project::where('main_page',1)->get();
        $navbar = true;
        return view('index',compact('home','about','contact','resume','portfolio','navbar'));
    }

    public function portfolio(){
        $projects = project::all();
        $portfolio = Portfolio::all();
        return view('portfolio',compact('projects','portfolio'));
    }

    public function project(project $project){

        return view('project',compact('project'));
    }

    public function message(Request $request){
        // valide that all fields are setting
        $request->validate([
            'first_name'        => ['required','string'],
            'last_name'         => ['required','string'],
            'email'             => ['required','email'],
            'subject'           => ['required','string'],
            'message'           => ['required','string'],
        ]);

        // save the message into DB
        Message::create([
            'first_name'        => $request->first_name,
            'last_name'         => $request->last_name,
            'email'             => $request->email,
            'subject'           => $request->subject,
            'message'           => $request->message,
        ]);

        // redirect to back page with a success Message
        return redirect()->back()->with('successMessage','Your message was sended . Thank you so much '.$request->first_name);
    }
}
