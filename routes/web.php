<?php

use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\DataShared;
use Illuminate\Support\Facades\Route;

Route::middleware([DataShared::class])->group(function(){
    Route::controller(HomeController::class)->group(function(){
        Route::get('/','index')->name('home');
        Route::get('/portfolio','portfolio')->name('portfolio');
        Route::get('portfolio/{project}','project')->name('project');
        Route::post('/message','message')->name('message');
    });
});


