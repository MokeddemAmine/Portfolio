<?php

namespace App\Http\Controllers;

use App\Models\Home;
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
}
