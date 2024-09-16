<?php

namespace App\Http\Controllers\admin\main;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminMainAboutController extends Controller
{
    public function index(){
        $about = Home::where('section','about')->first();
        
        return view('admin.page.main.about.index',compact('about'));
    }
    public function edit(){
        $about = Home::where('section','about')->first();
        return view('admin.page.main.about.edit',compact('about'));
    }

    public function store(Request $request){

        $request->validate([
            'title'         => ['required','string'],
            'description'   => ['required','string'],
            'picture'       => ['required','image','mimes:jpeg,png,jpg,gif','max:2048'],
        ]);
        
        if ($request->hasFile('picture')) {
            $imagePath = $request->file('picture')->store('images', 'public');
            $about = Home::where('section','about')->first();
            if($about && $about->picture){
                if (Storage::disk('public')->exists($about->picture)) {
                    Storage::disk('public')->delete($about->picture);
                }
            }
            DB::table('homes')->updateOrInsert(
                ['section' => 'about'],
                [
                    'title'         => $request->title,
                    'description'  => $request->description,
                    'picture'       => $imagePath,
                ]
            );
            return redirect()->route('admin.dashboard.main.about.index')->with('successMessage','updated with success');
        }

        return back()->with('errorMessage','something was wrong');
    }
}
