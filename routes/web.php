<?php

use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\DataShared;
use App\Http\Middleware\VisitWebsite;
use Illuminate\Support\Facades\Route;

Route::middleware([DataShared::class,VisitWebsite::class])->group(function(){
    Route::controller(HomeController::class)->group(function(){
        Route::get('/','index')->name('home');
        Route::get('/portfolio','portfolio')->name('portfolio');
        Route::get('portfolio/{project}','project')->name('project');
        Route::get('/blogs/{category}','blogs_show')->name('blogs.show');
        Route::get('/blog/{blog}','blog_show')->name('blog.show');
        Route::post('/message','message')->name('message');
    });
});


