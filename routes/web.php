<?php

use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function(){
    Route::get('/','index')->name('home');
    Route::get('/portfolio','portfolio')->name('portfolio');
    Route::get('portfolio/{project}','project')->name('project');
});

