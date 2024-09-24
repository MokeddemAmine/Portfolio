<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AuthAdmin;
use Illuminate\Http\Request;

class KeysAdminController extends Controller
{
    public function index(){
        $keys = AuthAdmin::all();
        return view('admin.key.index',compact('keys'));
    }
    public function create(){

        return view('admin.key.create');
    }
    public function store(Request $request){
        $request->validate([
            'key'   => ['required','string','min:5']
        ]);
        AuthAdmin::create([
            'password'  => $request->key,
        ]);
        return redirect()->back()->with('successMessage','key added with success');
    }
    public function edit(AuthAdmin $key){

        return view('admin.key.edit',compact('key'));
    }
    public function update(Request $request,AuthAdmin $key){
        $request->validate([
            'key'       => ['required','string','min:5','unique:auth_admins,password,'.$key->id],
        ]);
        $key->update([
            'password'  => $request->key,
        ]);
        return redirect()->back()->with('successMessage','key updated with success');
    }
    public function destroy(AuthAdmin $key){
        $key->delete();
        return redirect()->back()->with('successMessage','key deleted with success');
    }
}
