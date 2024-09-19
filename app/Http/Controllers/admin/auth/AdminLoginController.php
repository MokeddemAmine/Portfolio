<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminLoginController extends Controller
{

    public function index(){
        return view('admin.auth.login');
    }
    public function store(Request $request){
        $request->validate([
            'email'         => ['required','email','exists:admins,email'],
            'password'      => ['required','string'],
            'remember_me'   => ['string','in:remember'],
        ]);
        $data = $request->only('email','password');
        if(Auth::guard('admin')->attempt($data,$request->remember_me)){
            return redirect()->route('admin.dashboard.index');
        }else{
            return redirect()->back()->withInput(['email' => $request->email])->with('errorMessage',"These credentials don't much our records");
        }
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.dashboard.login');
    }

    public function update_admin(Request $request,Admin $admin){
        $request->validate([
            'name'              => ['required','string'],
            'email'             => ['required','email',Rule::unique('admins','email')->ignore($admin->id)],
            'brand_image'       => ['nullable','image','mimes:jpeg,png,jpg,gif','max:2048'],
            'brand_text'        => ['nullable','string'],
            'brand_image_check' => ['nullable','integer','in:1'],
            'brand_text_check'  => ['nullable','integer','in:1'],
        ]);
        if(isset($request->brand_image) || isset($request->brand_text)){
            if($request->hasFile('brand_image')){
                $imagePath = $request->file('brand_image')->store('images', 'public');
                $website = Home::where('section','website')->first();
                if($website && $website->picture){
                    if (Storage::disk('public')->exists($website->picture)) {
                        Storage::disk('public')->delete($website->picture);
                    }
                }
                if(isset($request->brand_text)){
                    DB::table('homes')->updateOrInsert(
                        ['section' => 'website'],
                        [
                            'title'         => $request->brand_text,
                            'picture'       => $imagePath,
                            'name'          => isset($request->brand_image_check)?1:0,
                            'description'   => isset($request->brand_text_check)?1:0,
                        ]
                    );
                }else{
                    DB::table('homes')->updateOrInsert(
                        ['section' => 'website'],
                        [
                            'picture'       => $imagePath,
                            'name'          => isset($request->brand_image_check)?1:0,
                            'description'   => isset($request->brand_text_check)?1:0,
                        ]
                    );
                }
                
            }else{
                if(isset($request->brand_text)){
                    DB::table('homes')->updateOrInsert(
                        ['section' => 'website'],
                        [
                            'title'         => $request->brand_text,
                            'name'          => isset($request->brand_image_check)?1:0,
                            'description'   => isset($request->brand_text_check)?1:0,
                        ]
                    );
                }
            }
        }
        $admin->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->back()->with('successMessage','Info updated with success');
    }

    public function update_picture_admin(Request $request,Admin $admin){
        $request->validate([
            'picture'       => ['required','image','mimes:jpeg,png,jpg,gif','max:2048'],
        ]);
        if($request->hasFile('picture')){
            $imagePath = $request->file('picture')->store('images','public');
            if($admin && $admin->picture){
                if(Storage::disk('public')->exists($admin->picture)){
                    Storage::disk('public')->delete($admin->picture);
                }
            }
            $admin->update([
                'picture'   => $imagePath,
            ]);
        }
        return redirect()->back()->with('successMessage','Profile picture updated with success');
    }
}
