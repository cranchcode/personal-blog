<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>['EnsureSession']],function(){
    Route::get('/login',[LoginController::class , 'viewLogin']);
    Route::post('/login',[LoginController::class , 'authenticate']);
});


Route::group(['middleware'=>['EnsureLogin']],function (){
    Route::get('/dashboard',[LoginController::class , 'viewDashboard']);

    Route::resource('dashboard/articles',ArticleController::class);
});

