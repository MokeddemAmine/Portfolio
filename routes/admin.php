<?php

use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\auth\AdminLoginController;
use App\Http\Controllers\admin\auth\AdminPasswordController;
use App\Http\Controllers\admin\auth\AdminRegisterController;
use App\Http\Controllers\admin\auth\AdminVerificationEmailController;
use App\Http\Controllers\admin\main\AdminMainAboutController;
use App\Http\Controllers\admin\main\AdminMainContactController;
use App\Http\Controllers\admin\main\AdminMainHomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/dashboard')->name('admin.dashboard.')->group(function(){

    Route::controller(AdminHomeController::class)->group(function(){
        Route::middleware(['is_admin','is_verify_email'])->group(function(){
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
            Route::get('/task-list','task_list')->name('task_list');
        });
        
    });

    Route::controller(AdminVerificationEmailController::class)->group(function(){
        Route::middleware('email_verified')->group(function(){
            Route::middleware('is_admin')->group(function(){
                Route::get('/verifyEmail','verify_email')->name('verification.notice');
                Route::post('/verifyEmail','verify_email_resend')->name('verification.resend');
            });
            Route::get('/verify_email_send/{user_id}/{user_email}/{user_created_at}','verify_email_send');
        });
    });

    Route::controller(AdminLoginController::class)->group(function(){

        Route::get('/login','index')->name('login');
        Route::post('/login','store')->name('logins.store');
        Route::get('/login/logout','logout')->name('logins.logout');
        
    });

    Route::middleware('if_auth_admin')->group(function(){

        Route::controller(AdminPasswordController::class)->group(function(){
            Route::get('/forgot_password','forgot_password')->name('forgot_password');
            Route::post('/reset_password','reset_password')->name('reset.password');
            Route::get('/reset_password_confirm/{mail}/{token}','edit')->name('reset.password.confirm');
            Route::post('/reset_update_passwoed','password_update')->name('password.update');
        });
    
        Route::controller(AdminRegisterController::class)->group(function(){
            Route::get('/register','index')->name('register');
            Route::post('/register','store')->name('registers.store');
        });

    });

    Route::prefix('/main')->name('main.')->group(function(){
        Route::prefix('/home')->name('home.')->group(function(){
            Route::controller(AdminMainHomeController::class)->group(function(){
                Route::get('/','index')->name('index');
                Route::get('/edit','edit')->name('edit');
                Route::post('/','store')->name('store');
            });
        });

        Route::prefix('/about')->name('about.')->group(function(){
            Route::controller(AdminMainAboutController::class)->group(function(){
                Route::get('/','index')->name('index');
                Route::get('/edit','edit')->name('edit');
                Route::post('/','store')->name('store');
            });
        });

        Route::prefix('/contact')->name('contact.')->group(function(){
            Route::controller(AdminMainContactController::class)->group(function(){
                Route::get('/','index')->name('index');
                Route::get('/edit','edit')->name('edit');
                Route::post('/','store')->name('store');
            });
        });
    });

   
});

