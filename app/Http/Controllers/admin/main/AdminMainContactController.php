<?php

namespace App\Http\Controllers\admin\main;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminMainContactController extends Controller
{
    public function index(){
        $contact = Home::where('section','contact')->first();
        
        return view('admin.main.contact.index',compact('contact'));
    }
    public function edit(){
        $contact = Home::where('section','contact')->first();
        return view('admin.main.contact.edit',compact('contact'));
    }

    public function store(Request $request){
        
        $request->validate([
            'title'     => ['required','string'],
            'linkedin'  => ['string','nullable'],
            'github'    => ['string','nullable'],
            'facebook'  => ['string','nullable'],
            'instagram' => ['string','nullable'],
            'x_twitter' => ['string','nullable'],
            'website'   => ['string','nullable'],
            'gmail'     => ['string','nullable'],
            'pinterest' => ['string','nullable'],
        ]);
            
            $links = $request->except('title','_token');
            
            DB::table('homes')->updateOrInsert(
                ['section' => 'contact'],
                [
                    'title'     => $request->title,
                    'contacts'  => json_encode($links),
                    
                ]
            );
            return redirect()->route('admin.dashboard.main.contact.index')->with('successMessage','updated with success');

    }
}
