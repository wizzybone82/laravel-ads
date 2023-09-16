<?php

use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\AdminController;
  
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
Auth::routes();


Route::get('admin/home', [AdminController::class, 'index'])->name('admin.home')->middleware('is_admin');
Route::get('admin/users', [AdminController::class, 'users_list'])->name('admin.users')->middleware('is_admin');
Route::get('admin/users/activate/{id}', [AdminController::class, 'activate_user'])->name('admin.activate')->middleware('is_admin');
Route::get('admin/ads/delete/{ad_id}', [AdminController::class, 'delete_ad'])->name('admin.ad.delete')->middleware('is_admin');






Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/ads/list', [AdsController::class, 'index'])->name('ads.list');
Route::get('/ads/create',[AdsController::class,'create'])->name('ads.create');
Route::get('/ads/edit/{ad_id}',[AdsController::class,'edit'])->name('ads.edit');
Route::post('/ads/store',[AdsController::class,'store'])->name('ads.store');
Route::post('/ads/update/{ad_id}',[AdsController::class,'update'])->name('ads.update');
Route::get('/ads/delete/{ad_id}',[AdsController::class,'destroy'])->name('ads.delete');
Route::get('/ads/all_ads',[AdsController::class,'all_ads'])->name('ads.all');
Route::get('/ads/show/{ad_id}',[AdsController::class,'show'])->name('ads.show');
Route::get('/ads/control_status/{ad_id}',[AdsController::class,'change_status'])->name('ads.control');


Route::post('/comment',[CommentsController::class,'store'])->name('comment.store');

