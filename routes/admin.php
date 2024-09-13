<?php

use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\auth\AdminLoginController;
use App\Http\Controllers\admin\auth\AdminRegisterController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/dashboard')->name('admin.dashboard.')->group(function(){

    Route::controller(AdminHomeController::class)->group(function(){
        Route::get('/','index')->name('index');
        Route::get('/app-chat','app_chat')->name('app_chat');
        Route::get('/mail-inbox','mail_inbox')->name('mail_inbox');
        Route::get('/404','page_404')->name('page_404');
        Route::get('/500','page_500')->name('page_500');
        Route::get('/account-settings','account_settings')->name('account_settings');
        Route::get('/clients','clients')->name('clients');
        Route::get('/coming-soon','coming_soon')->name('coming_soon');
        Route::get('/contacts','contacts')->name('contacts');
        Route::get('/employees','employees')->name('employees');
        Route::get('/faq','faq')->name('faq');
        Route::get('/file-manager','file_manager')->name('file_manager');
        Route::get('/gallery','gellery')->name('gallery');
        Route::get('/pricing','pricing')->name('pricing');
        Route::get('/tast-list','task_list')->name('task_list');
    });

    Route::controller(AdminLoginController::class)->group(function(){
        Route::get('/login','index')->name('login');
    });
    Route::controller(AdminRegisterController::class)->group(function(){
        Route::get('/register','index')->name('register');
    });
});