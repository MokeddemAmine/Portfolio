<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogRelating;
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

     protected function get_deep($categories){

        $deep = 0;
        $deep_array = [];
        foreach ($categories as $cat) {
            if($cat->parent){
                $deep_array[] = $cat->parent;
            }  
        }
        
        if(count($deep_array)){
            $deep_array = array_unique($deep_array);
            while(count($deep_array)){
                foreach($deep_array as $parent){
                    $blogCat = BlogCategory::where('id',$parent)->first();
                    if($blogCat->parent != null){
                        if(!in_array($blogCat->parent,$deep_array)){
                            $deep_array[] = $blogCat->parent;
                        }
                        
                    }
                    $deep_array = array_diff($deep_array,[$parent]);
                }
                $deep++;
            }
        }
        return $deep;

    }

    public function index()
    {
        $home = Home::where('section','home')->first();
        $about = Home::where('section','about')->first();
        $contact = Home::where('section','contact')->first();
        $resume = Resume::all();
        $portfolio = project::where('main_page',1)->get();
        $navbar = true;
        $blogs = Blog::where('main_page',1)->get();
        return view('index',compact('home','about','contact','resume','portfolio','blogs','navbar'));
    }

    public function portfolio(){
        $projects = project::paginate(12);
        $portfolio = Portfolio::all();
        return view('portfolio',compact('projects','portfolio'));
    }

    public function project(project $project){

        return view('project',compact('project'));
    }

    public function blogs_show($category){

        $cat = new BlogCategory();
        $blogs = null;

        if($category == 'all'){
            $cat->name = 'all';
            $blogs = Blog::paginate(1);
            
        }else{
            $cat = BlogCategory::where('slug',$category)->first();
            $blogsCats = BlogRelating::where('blog_category_id',$cat->id)->pluck('blog_id')->toArray();
            $blogs = Blog::whereIn('id',$blogsCats)->paginate(12);
        }
        
        $categories = BlogCategory::all();
        $deep = $this->get_deep($categories);

        return view('blogs_cats',compact('cat','blogs','categories','deep'));
    }

    public function blog_show($blog){
        // get the blog
        $blog = Blog::where('slug',$blog)->first();

        $categories = BlogCategory::all();

        $deep = $this->get_deep($categories);
        
        $blogs_related = null;
        if($blog->categories && count($blog->categories)){
            // get the id of  categories of the blog
            $cats = [];
            foreach($blog->categories as $cat){
                $cats[] = $cat->id;
            }
            // get the relating blogs of the current blog
            $relatings = BlogRelating::whereIn('blog_category_id',$cats)->pluck('blog_id')->toArray();
            $relatings = array_unique($relatings);
            
            $relatings = array_diff($relatings,[$blog->id]);
            $blogs_related = Blog::whereIn('id',$relatings)->orderBy('updated_at','desc')->take(4)->get();
        }
        

        return view('blog',compact('blog','blogs_related','categories','deep'));
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
