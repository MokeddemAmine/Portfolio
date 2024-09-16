<?php

namespace App\Http\Controllers\admin\main;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminMainHomeController extends Controller
{
    public function index(){
        $home = Home::where('section','home')->first();
        
        return view('admin.page.main.home.index',compact('home'));
    }
    public function edit(){
        $home = Home::where('section','home')->first();
        return view('admin.page.main.home.edit',compact('home'));
    }

    public function store(Request $request){


        $request->validate([
            'name'      => ['required','string'],
            'title'     => ['required','string'],
            'contact'   => ['required','string'],
            'picture'   => ['required','image','mimes:jpeg,png,jpg,gif','max:2048'],
        ]);
        
        if ($request->hasFile('picture')) {
            $imagePath = $request->file('picture')->store('images', 'public');
            $home = Home::where('section','home')->first();
            if($home && $home->picture){
                if (Storage::disk('public')->exists($home->picture)) {
                    Storage::disk('public')->delete($home->picture);
                }
            }
            DB::table('homes')->updateOrInsert(
                ['section' => 'home'],
                [
                    'name'      => $request->name,
                    'title'     => $request->title,
                    'contacts'  => $request->contact,
                    'picture'   => $imagePath,
                ]
            );
            return redirect()->route('admin.dashboard.main.home.index')->with('successMessage','updated with success');
        }

        return back()->with('errorMessage','something was wrong');
    }
}
