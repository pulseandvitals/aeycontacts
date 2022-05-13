<?php

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\StickyNoteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostcardController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
Route::get('/', function () {
    return redirect('/landpage');;
});


//dashboardview
Route::get('/dashboard',[DashboardController::class,'index']);

Route::post('/status', [UserController::class,'changeStatus']);


//contact route
Route::get('/contacts',[ContactsController::class,'index']);
Route::get('/fetchcontacts',[ContactsController::class,'fetchcontacts']);
Route::post('/addcontact',[ContactsController::class,'storecontact']);
Route::delete('/delete_contact/{id}',[ContactsController::class,'deletecontact']);
Route::get('/edit_contact/{id}',[ContactsController::class,'editcontact']);
Route::put('/update_contact/{id}',[ContactsController::class,'updatecontact']);

//sticky note route
Route::get('/sticky-notes',[StickyNoteController::class,'index']);
Route::post('/insert-note',[StickyNoteController::class,'storenote']);
Route::get('/fetchnote',[StickyNoteController::class,'fetchnote']);
Route::delete('/delete-note/{id}',[StickyNoteController::class,'deletenote']);

//post cards
Route::get('/post-cards',[PostcardController::class,'index']);
Route::post('/add-postcard',[PostcardController::class,'addpostcard']);
Route::get('/fetch-postcard',[PostcardController::class,'fetchpostcard']);

//api
Route::get('api',[ApiController::class,'index']);

//landpage
Route::get('/landpage',[DashboardController::class,'landpage']);

//notification
Route::get('/fetchnotification',[PostcardController::class,'fetchnotification']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();


