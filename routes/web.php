<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Media\MediaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('cpanel_admin.login');
});

Route::group(['as'=>'cpanel_admin.'], function(){
    Route::post('/login', [LoginController::class, "post"])->name("login.post");
    Route::middleware("check-session")->group(function(){
        Route::get('/dashboard', [DashboardController::class, "index"])->name("dashboard");
        Route::group(['prefix'=>'master','as'=>'master.'], function(){
            Route::group(['prefix'=>'company','as'=>'company.'], function(){
                Route::get('/', [CompanyController::class, "index"])->name("list");
                Route::get('/tambah', [CompanyController::class, "form"])->name("add");
                Route::get('/edit/{id}', [CompanyController::class, "form"])->name("edit");
                Route::get('/hapus/{id}', [CompanyController::class, "delete"])->name("delete");
                Route::post('/post/{id?}', [CompanyController::class, "post"])->name("post");
            });
        });
        Route::get('/logout', [LoginController::class, "logout"])->name("logout");
    });
    Route::group(['prefix'=>'media','as'=>'media.'], function(){
        Route::post('/tambah', [MediaController::class, "uploadFile"])->name("add");
    });
});