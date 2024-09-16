<?php

namespace App\Http\Controllers\admin\main;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Http\Request;

class AdminMainResumeController extends Controller
{
    public function index(){
        $resume = Resume::all();
        return view('admin.page.main.resume.index',compact('resume'));
    }
    public function create(){
        return view('admin.page.main.resume.create');
    }
    public function store(Request $request){
        $request->validate([
            'name'          => ['required','string'],
            'title'         => ['required','string'],
            'title2'        => ['required','string'],
            'display'       => ['required','string','in:commas,scroll'],
        ]);
        
        Resume::create([
            'name'                  => $request->name,
            'title_first_color'     => $request->title,
            'title_second_color'    => $request->title2,
            'display'               => $request->display,
        ]);

        return redirect()->back()->with('successMessage','Resume added successfully');
    }
    public function show(Resume $resume){
        
        return view('admin.page.main.resume.show',compact('resume'));
    }
    public function edit(Resume $resume){
        return view('admin.page.main.resume.edit',compact('resume'));
    }
    public function update(Request $request,Resume $resume){
        $request->validate([
            'name'          => ['required','string'],
            'title'         => ['required','string'],
            'title2'        => ['required','string'],
            'display'       => ['required','string','in:commas,scroll'],
        ]);
        $resume->update([
            'name'                  => $request->name,
            'title_first_color'     => $request->title,
            'title_second_color'    => $request->title2,
            'display'               => $request->display,
        ]);
        return redirect()->route('admin.dashboard.main.resume.index')->with('successMessage','resume updated with success');
    }
    public function destroy(Resume $resume){
        if($resume){
            $resume->delete();
        }
        return redirect()->back()->with('successMessage','resume deleted with success');
    }
}
