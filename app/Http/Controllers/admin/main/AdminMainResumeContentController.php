<?php

namespace App\Http\Controllers\admin\main;

use App\Http\Controllers\Controller;
use App\Models\ContentResume;
use App\Models\Resume;
use Illuminate\Http\Request;

class AdminMainResumeContentController extends Controller
{
    public function create(Resume $resume){
        return view('admin.main.resume.content.create',compact('resume'));
    }
    public function store(Request $request,Resume $resume){
        
        $request->validate([
            'title'     => ['required','string'],
            'sub_title' => ['required','string'],
            'level'     => ['numeric','nullable'],
        ]);

        ContentResume::create([
            'title'     => $request->title,
            'sub_title' => $request->sub_title,
            'level'     => $request->level,
            'resume_id' => $resume->id,
        ]);

        return redirect()->back()->with('successMessage','Content added with success');
    }

    public function edit(Resume $resume,ContentResume $content){

        return view('admin.main.resume.content.edit',compact('content','resume'));
    }

    public function update(Request $request,Resume $resume, ContentResume $content){
        $request->validate([
            'title'     => ['required','string'],
            'sub_title' => ['required','string'],
            'level'     => ['numeric','nullable'],
        ]);

        $content->update([
            'title'     => $request->title,
            'sub_title' => $request->sub_title,
            'level'     => $request->level,
        ]);
        return redirect()->back()->with('successMessage','content updated with success');
    }
    public function destroy(ContentResume $content){
        if($content){
            $content->delete();
            return redirect()->back()->with('successMessage','Content deleted with success');
        }
    }
}
