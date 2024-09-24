<?php

use App\Http\Controllers\admin\AdminBlogCategoryController;
use App\Http\Controllers\admin\AdminBlogController;
use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\AdminMessageController;
use App\Http\Controllers\admin\auth\AdminLoginController;
use App\Http\Controllers\admin\auth\AdminPasswordController;
use App\Http\Controllers\admin\auth\AdminRegisterController;
use App\Http\Controllers\admin\auth\AdminVerificationEmailController;
use App\Http\Controllers\admin\KeysAdminController;
use App\Http\Controllers\admin\main\AdminMainAboutController;
use App\Http\Controllers\admin\main\AdminMainContactController;
use App\Http\Controllers\admin\main\AdminMainHomeController;
use App\Http\Controllers\admin\main\AdminMainPortfolioController;
use App\Http\Controllers\admin\main\AdminMainProjectController;
use App\Http\Controllers\admin\main\AdminMainResumeContentController;
use App\Http\Controllers\admin\main\AdminMainResumeController;
use App\Http\Middleware\DataShared;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->name('admin.')->group(function(){

   
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

        Route::controller(AdminLoginController::class)->group(function(){
            Route::get('/login','index')->name('login');
            Route::post('/login','store')->name('logins.store');
        });

    });

    Route::prefix('/dashboard')->name('dashboard.')->group(function(){ 
        Route::middleware([DataShared::class])->group(function(){

            Route::middleware(['is_admin','is_verify_email'])->group(function(){
                Route::controller(AdminHomeController::class)->group(function(){
                    Route::get('/','index')->name('index');
                    Route::get('/mail-inbox','mail_inbox')->name('mail_inbox');
                    Route::get('/account-settings','account_settings')->name('account_settings');
                });

                Route::controller(AdminMessageController::class)->group(function(){
                    Route::post('/get_message','get_message')->name('get_message');
                    Route::get('/messages_in_time','messages_in_time')->name('messages_in_time');
                    Route::get('/read_message/{message}','read_message')->name('read_message');
                    Route::get('/read_all_messages','read_all_messages')->name('read_all_messages');
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
                Route::get('/login/logout','logout')->name('logins.logout');

                Route::middleware(['is_admin','is_verify_email'])->group(function(){
                    Route::post('/update_admin/{admin}','update_admin')->name('update_admin');
                    Route::post('/update_picture_admin{admin}','update_picture_admin')->name('update_picture_admin');
                });
                
            });

            Route::prefix('/main')->name('main.')->group(function(){
                Route::get('/',function(){
                    return view('admin.main.index');
                })->name('index');
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

                Route::prefix('/resume')->name('resume.')->group(function(){
                    Route::controller(AdminMainResumeController::class)->group(function(){
                        Route::get('/','index')->name('index');
                        Route::get('/create','create')->name('create');
                        Route::post('/','store')->name('store');
                        Route::get('/{resume}','show')->name('show');
                        Route::get('/{resume}/edit','edit')->name('edit');
                        Route::put('/{resume}','update')->name('update');
                        Route::delete('/{resume}','destroy')->name('destroy');
                    });
                    Route::prefix('/content')->name('content.')->group(function(){
                        Route::controller(AdminMainResumeContentController::class)->group(function(){
                            Route::get('/{resume}/create','create')->name('create');
                            Route::post('/{resume}','store')->name('store');
                            Route::get('/{resume}/{content}/edit','edit')->name('edit');
                            Route::put('/{resume}/{content}','update')->name('update');
                            Route::delete('/{content}','destroy')->name('destroy');
                        });
                    });
                });
            });

            Route::prefix('/portfolio')->name('portfolio.')->group(function(){
                Route::controller(AdminMainPortfolioController::class)->group(function(){
                    Route::get('/','index')->name('index');
                    Route::get('/create','create')->name('create');
                    Route::post('/','store')->name('store');
                    Route::get('/{portfolio}','show')->name('show');
                    Route::get('/{portfolio}/edit','edit')->name('edit');
                    Route::put('/{portfolio}','update')->name('update');
                    Route::delete('/{portfolio}','destroy')->name('destroy');
                });

                Route::prefix('/project')->name('project.')->group(function(){
                    Route::controller(AdminMainProjectController::class)->group(function(){
                        Route::get('/create','create')->name('create');
                        Route::post('/','store')->name('store');
                        Route::get('/{project}','show')->name('show');
                        Route::get('/{project}/edit','edit')->name('edit');
                        Route::put('/{project}','update')->name('update');
                        Route::delete('/{project}','destroy')->name('destroy');
                        Route::post('/checkMainPage','checkProjectIntoMainPage')->name('checkProjectIntoMainPage');
                    });
                });

            });

            Route::prefix('/blog')->name('blog.')->group(function(){
                Route::controller(AdminBlogController::class)->group(function(){
                    Route::get('/','index')->name('index');
                    Route::get('/create','create')->name('create');
                    Route::post('/','store')->name('store');
                    Route::get('/{blog}','show')->name('show');
                    Route::get('/{blog}/edit','edit')->name('edit');
                    Route::put('/{blog}','update')->name('update');
                    Route::delete('/{blog}','destroy')->name('destroy');
                    Route::post('/upload_image','upload_image')->name('upload_image');
                    Route::post('/checkBlogIntoMainPage','checkBlogIntoMainPage')->name('checkBlogIntoMainPage');
                });
                
               
            });
            Route::prefix('/categories')->name('categories.')->group(function(){
                Route::controller(AdminBlogCategoryController::class)->group(function(){
                    Route::get('/','index')->name('index');
                    Route::get('/create','create')->name('create');
                    Route::post('/','store')->name('store');
                    Route::get('{category}','edit')->name('edit');
                    Route::put('{category}','update')->name('update');
                    Route::delete('{category}','destroy')->name('destroy');
                });
                
            });

        Route::prefix('/keys')->name('keys.')->group(function(){
            Route::controller(KeysAdminController::class)->group(function(){
                Route::get('/','index')->name('index');
                Route::get('/create','create')->name('create');
                Route::post('/','store')->name('store');
                Route::get('/{key}/edit','edit')->name('edit');
                Route::put('/{key}','update')->name('update');
                Route::delete('/{key}','destroy')->name('destroy');
            });
        });
            

        });
    });
});

