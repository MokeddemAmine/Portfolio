<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminBlogCategoryController extends Controller
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
        $categories = BlogCategory::all();

        $deep = $this->get_deep($categories);

        return view('admin.blog.category.index',compact('categories','deep'));
    }
    public function create(){
        $categories = BlogCategory::all();

        $deep = $this->get_deep($categories);

        return view('admin.blog.category.create',compact('categories','deep'));
    }
    public function store(Request $request){

        $request->validate([
            'name'      => ['required','string','unique:blog_categories,name'],
            'parent'    => ['nullable','numeric','exists:blog_categories,id'],
        ]);
        BlogCategory::create([
            'name'      => $request->name,
            'parent'    => $request->parent?$request->parent:null,
        ]);
        return redirect()->back()->with('successMessage','category added with success');
    }   
    public function edit(BlogCategory $category){

        $categories = BlogCategory::all();

        $deep = $this->get_deep($categories);

        return view('admin.blog.category.edit',compact('category','categories','deep'));
    }
    public function update(Request $request,BlogCategory $category){

        $request->validate([
            'name'      => ['required','string','unique:blog_categories,name,'.$category->id],
            'parent'    => ['nullable','numeric','exists:blog_categories,id'],
        ]);
        // check if the new parent is one of its childrens
        $childs = BlogCategory::where('parent',$category->id)->pluck('id')->toArray();
        $change_parent_of_childs = false;
        while(count($childs)){
            foreach($childs as $child){
                if($child == $request->parent){
                    $change_parent_of_childs = true;
                    break;
                }
            }
            if($change_parent_of_childs){
                break;
            }
            $childs = BlogCategory::whereIn('parent',$childs)->pluck('id')->toArray();
        }
        // change the parent of childrens if the new parent is one of its childrens
        if($change_parent_of_childs){
            $childs = BlogCategory::where('parent',$category->id)->get();
            foreach($childs as $child){
                $child->update([
                    'parent'    => $category->parent,
                ]);
            }
        }
        // change data of the category
        $category->update([
            'name'      => $request->name,
            'parent'    => $request->parent,
        ]);
        return redirect()->back()->with('successMessage','category updated with success');
    }
    public function destroy(BlogCategory $category){
        // check if this category has childrens
        $childs = BlogCategory::where('parent',$category->id)->get();
        if(count($childs)){
            // change the parent of the childrens
            foreach($childs as $child){
                $child->update([
                    'parent'    => $category->parent,
                ]);
            }
        }
        // delete the category
        $category->delete();
        return redirect()->back()->with('successMessage','Category deleted with success');
    }
}
