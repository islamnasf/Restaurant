<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IslamController;
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


Route::get('/',[IslamController::class,'index'])->name('indexrest');
Route::get('redirects',[IslamController::class,'redirects']);
//////////////////////////////////////////////////////////////////
Route::get('/users',[AdminController::class,'user'])->name('users');
Route::get('/delete/{id}',[AdminController::class,'delete'])->name('deleteuser');
Route::get('/foodmenu',[AdminController::class,'foodmenu'])->name('foodmenu');
Route::post('/uploadfood',[AdminController::class,'uploadfood'])->name('uploadfood');
Route::get('/deletefood/{id}',[AdminController::class,'deletefood']);
Route::get('/updatefood/{id}',[AdminController::class,'updatefood']);
Route::post('/updatefooddata/{id}',[AdminController::class,'updatefooddata']);
//reservation
Route::post('/reservation',[AdminController::class,'reservation']);
Route::get('/reservationControl',[AdminController::class,'reservationControl']);
Route::get('/deletereservation/{id}',[AdminController::class,'deletereservation']);

//chef
Route::get('/chefControl',[AdminController::class,'chefControl'])->name('chefControl');
Route::post('/chef_Control',[AdminController::class,'chef_Control']);
Route::get('/updatechef/{id}',[AdminController::class,'updatechef']);
Route::post('/updatechefdata/{id}',[AdminController::class,'updatechefdata']);
Route::get('/deletechef/{id}',[AdminController::class,'deletechef']);
//cart
Route::post('/addcart/{id}',[AdminController::class,'addcart']);
Route::get('/showcart/{id}',[AdminController::class,'showcart']);
Route::get('/remove/{id}',[AdminController::class,'remove'])->name('remove');
//order
Route::post('/orderconfirm',[AdminController::class,'orderconfirm']);
Route::get('/ordercontrol',[AdminController::class,'ordercontrol']);





















Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
