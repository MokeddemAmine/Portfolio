<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogImage;
use App\Models\BlogRelating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBlogController extends Controller
{
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

    public function index(){
        $blogs = Blog::all();
        return view('admin.blog.index',compact('blogs'));
    }
    public function create(){
        
        $blog_categories = BlogCategory::all();

        $deep = $this->get_deep($blog_categories);

        return view('admin.blog.create',compact('blog_categories','deep'));

    }
    public function store(Request $request){
        
        $request->validate([
            'title'     => ['required','string'],
            'picture'   => ['required','image','mimes:jpg,jpeg,png','max:2048'],
            'category'  => ['nullable'],
            'category.*'=> ['nullable','numeric','exists:blog_categories,id'],
            'content'   => ['required','string'],
        ]);

        if($request->hasFile('picture')){
            $picture = $request->file('picture')->store('uploads', 'public');

            $blog = Blog::create([
                'title'     => $request->title,
                'picture'   => $picture,
                'content'   => $request->content,
                
            ]);
    
            if(isset($request->category)){
                foreach($request->category as $cat){
                    BlogRelating::create([
                        'blog_id'           => $blog->id,
                        'blog_category_id'  => $cat,
                    ]);
                }
            }
            $blog_images = BlogImage::where('tmp',1)->get();
            if($blog_images && count($blog_images)){
                foreach($blog_images as $img){
                    if(strpos($blog->content,$img->image)){
                        $img->update([
                            'tmp'       => 0,
                            'blog_id'   => $blog->id,
                        ]);
                    }else{
                        if(Storage::disk('public')->exists($img->image)){
                            Storage::disk('public')->delete($img->image);
                        }
                        $img->delete();
                    }
                    
                }
            }
        }
        
        return redirect()->back()->with('successMessage','blog added with success');
    }

    public function show(Blog $blog){
        return view('admin.blog.show',compact('blog'));
    }

    public function edit(Blog $blog){
        $blog_categories = BlogCategory::all();
        $deep = $this->get_deep($blog_categories);
        return view('admin.blog.edit',compact('blog','blog_categories','deep'));
    }

    public function update(Request $request,Blog $blog){
        $request->validate([
            'title'         => ['required','string'],
            'picture'       => ['nullable','image','mimes:jpeg,jpg,png,gif','max:2048'],
            'category.*'    => ['required','numeric','exists:blog_categories,id'],
            'content'       => ['required','string'],
        ]);
        if($request->hasFile('picture')){
            if(Storage::disk('public')->exists($blog->picture)){
                Storage::disk('public')->delete($blog->picture);
            }
            $picture = $request->file('picture')->store('uploads', 'public');
            $blog->update([
                'picture'   => $picture
            ]) ;
        }

        // delete all previous relating with categories 
        $prev_relating = BlogRelating::where('blog_id',$blog->id)->get();
        if($prev_relating && count($prev_relating)){
            foreach($prev_relating as $relating){
                $relating->delete();
            }
        }
        // set the new relatings with categories
        if(isset($request->category) && count($request->category)){
            foreach($request->category as $cat){
                BlogRelating::create([
                    'blog_id'           => $blog->id,
                    'blog_category_id'  => $cat,
                ]);
            }
        }
        // update the blog
        $blog->update([
            'title'     => $request->title,
            'content'   => $request->content
        ]);
        // get all images related to the blog content
        $blog_images = BlogImage::where('blog_id',$blog->id)->orWhere('tmp',1)->get();
        if($blog_images && count($blog_images)){
            foreach($blog_images as $img){
                if(strpos($request->content,$img->image)){
                    $img->update([
                        'tmp'       => 0,
                        'blog_id'   => $blog->id,
                    ]);
                }else{
                    if(Storage::disk('public')->exists($img->image)){
                        Storage::disk('public')->delete($img->image);
                    }
                    $img->delete();
                }
                
            }
        }
        return redirect()->back()->with('successMessage','Blog updated with success');
    }

    public function destroy(Blog $blog){
        // delete all images related to content of the blog
        $image_related = BlogImage::where('blog_id',$blog->id)->get();
        if($image_related && count($image_related)){
            foreach($image_related as $img){
                if(Storage::disk('public')->exists($img->image)){
                    Storage::disk('public')->delete($img->image);
                }
            }
        }
        // delete image related with blog
        if(Storage::disk('public')->exists($blog->picture)){
            Storage::disk('public')->delete($blog->picture);
        }
        $blog->delete();
        return redirect()->back()->with('successMessage','Blog deleted with success');
    }

    public function upload_image(Request $request){

        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($request->hasFile('upload') && $request->file('upload')->isValid()) {
            // Store the image
            $path = $request->file('upload')->store('uploads', 'public');
            $url = asset('storage/' . $path);
            // add image into DB
            BlogImage::create([
                'image' => $path,
            ]);
            // Return JSON response
            return response()->json([
                'fileName'  => $path,
                'uploaded'  => 1,
                'url' => $url
            ]);
        } else {
            // Return an error if the file upload fails
            return response()->json(['error' => 'File upload failed'], 400);
        }
    }

    public function checkBlogIntoMainPage(Request $request){
        
        $request->validate([
            'blog_id'    => ['required','numeric','exists:blogs,id'],
        ]);

        $blog = Blog::find($request->blog_id);
        

        if($blog->main_page == 1){
            $blog->update([
                'main_page' => 0,
            ]);
            return response()->json([
                'status'    => 'deleted',
                'blog'   => 'blog '.$blog->title.' deleted from main page'
            ]);
        }
        
        $blogs_checked = Blog::where('main_page',1)->get();

        if(count($blogs_checked) == 2){
            return response()->json([
                'status'    => false,
                'blog'   => 'we can not set more than 2 blogs in the main page '
            ]);
        }else{
            $blog->update([
                'main_page' => 1,
            ]);
            return response()->json([
                'status'    => true,
                'blog'   => 'blog '.$blog->title.' added to main page'
            ]);
        }
        return response()->json(['blog'  => $request->blog_id]);
    }
}
