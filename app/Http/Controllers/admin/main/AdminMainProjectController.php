<?php

namespace App\Http\Controllers\admin\main;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\project;
use App\Models\ProjectPortfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminMainProjectController extends Controller
{
    public function create(){
        $portfolios = Portfolio::all();
        return view('admin.page.main.portfolio.project.create',compact('portfolios'));
    }
    public function store(Request $request){

        $request->validate([
            'title'         => ['required','string'],
            'sub_title'     => ['required','string'],
            'description'   => ['required','string'],
            'pictures.*'    => ['required','image','mimes:jpeg,png,jpg,gif','max:2048'],
            'section'       => ['nullable','exists:portfolios,id'],
        ]);

        

        if($request->hasFile('pictures')){

            $pictures = $request->file('pictures');
            $allPictures = array();
            foreach($pictures as $picture){
                $filename = $picture->store('images','public');
                array_push($allPictures,$filename);
            }

            $pictures = json_encode($allPictures);

            
            $project = project::create([
                'title'         => $request->title,
                'sub_title'     => $request->sub_title,
                'description'   => $request->description,
                'pictures'      => $pictures,
            ]);
    
            if($request->section && count($request->section)){
                foreach($request->section as $section){
                    ProjectPortfolio::create([
                        'portfolio_id'  => $section,
                        'project_id'    => $project->id,
                    ]);
                }
            }
            
            return redirect()->back()->with('successMessage','Product added successfully');
            
      }
      return redirect()->back()->with('errorMessage', 'Something went wrong');
    }
    public function show(Project $project){
        return view('admin.page.main.portfolio.project.show',compact('project'));
    }
    public function edit(Project $project){
        $portfolios = Portfolio::all();
        return view('admin.page.main.portfolio.project.edit',compact('portfolios','project'));
    }
    public function update(Request $request,Project $project){
        
        $request->validate([
            'title'                 => ['required','string'],
            'sub_title'             => ['required','string'],
            'description'           => ['required','string'],
            'current_pictures.*'    => ['string'],
            'new_pictures.*'        => ['image','mimes:jpeg,png,jpg,gif','max:2048'],
            'section'               => ['nullable','exists:portfolios,id'],
        ]); 
        
        if($request->hasFile('new_pictures') || ($request->current_pictures && count($request->current_pictures))){ // check if there are any image *
            $pictures = [];
            
            if($request->current_pictures && count($request->current_pictures)){
                // verify all current pictures
                $get_current_pictures = json_decode($project->pictures);
                
                foreach($request->current_pictures as $picture){
                    if(!in_array($picture,$get_current_pictures)){
                        return redirect()->back()->with('errorMessage','something was wrong');
                    }
                    else{
                        $pictures[] = $picture;
                    }
                }
                // delete picture deleted from storage
                $pictures_delete = array_diff($get_current_pictures,$pictures);

                if(count($pictures_delete)){
                    foreach($pictures_delete as $picture_delete){
                        if(Storage::disk('public')->exists($picture_delete)){
                            Storage::disk('public')->delete($picture_delete);
                        }
                    }
                }
            }
            // add new pictures
            if($request->hasFile('new_pictures')){
                $new_pictures = $request->file('new_pictures');
                
                foreach($new_pictures as $picture){
                    $filename = $picture->store('images','public');
                    array_push($pictures,$filename);
                }
            }

            // edit portfolio sections related with project
            
            $current_sections = ProjectPortfolio::where('project_id',$project->id)->get();
            $current_sections_array = [];
            if($request->section && count($request->section)){// check if there are sections
                if(count($current_sections)){
                    foreach($current_sections as $section){
                        $current_sections_array[] = $section->portfolio_id;
                        if(!in_array($section->portfolio_id,$request->section)){
                            $section->delete();
                        }
                    }
                }
                
                $new_sections = array_diff($request->section,$current_sections_array);
                foreach($new_sections as $section){
                    ProjectPortfolio::create([
                        'portfolio_id'  => $section,
                        'project_id'    => $project->id,
                    ]);
                }
            }else{
                if(count($current_sections)){
                    foreach($current_sections as $section){
                         $section->delete(); 
                    }
                }
            }
            // update project data
            $project->update([
                'title'         => $request->title,
                'sub_title'     => $request->sub_title,
                'description'   => $request->description,
                'pictures'      => $pictures,   
            ]);
            return redirect()->back()->with('successMessage','Project updated with success');
        }
        return redirect()->back()->with('errorMessage','You dont set any image for the project');
    }
    public function destroy(Project $project){
        $pictures = json_decode($project->pictures);
        foreach($pictures as $picture){
            if(Storage::disk('public')->exists($picture)){
                Storage::disk('public')->delete($picture);
            }
        }
        $project->delete();
        return redirect()->back()->with('successMessage','project deleted with success');
    }
}
