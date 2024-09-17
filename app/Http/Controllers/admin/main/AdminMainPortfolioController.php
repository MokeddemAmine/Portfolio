<?php

namespace App\Http\Controllers\admin\main;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminMainPortfolioController extends Controller
{
    public function index(){
        $portfolios = Portfolio::all();
        $projects = project::all();
        return view('admin.page.main.portfolio.index',compact('portfolios','projects'));
    }

    public function create(){
        return view('admin.page.main.portfolio.create');
    }
    public function store(Request $request){
        $request->validate([
            'section'   => ['required','string','unique:portfolios,section'],
        ]);
        
        Portfolio::create([
            'section'   => $request->section,
        ]);
        return redirect()->back()->with('successMessage','portfolio section added with success');
    }
    public function show(Portfolio $portfolio){

    }
    public function edit(Portfolio $portfolio){
        return view('admin.page.main.portfolio.edit',compact('portfolio'));
    }
    public function update(Request $request,Portfolio $portfolio){
        $request->validate([
            'section'   => ['required','string','unique:portfolios,section,'.$portfolio->id],
        ]);
        
        $portfolio->update([
            'section'   => $request->section,
        ]);

        return redirect()->back()->with('successMessage','The section was updated successfully');
    }
    public function destroy(Portfolio $portfolio){
        $portfolio->delete();
        return redirect()->back()->with('successMessage','The section was deleted successfully');
    }
}
