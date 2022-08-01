<?php

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StickyNoteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostcardController;
use App\Http\Controllers\JobOffersContoller;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
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

//users
Route::post('/status', [UserController::class,'changeStatus']);
Route::get('/users', [UserController::class, 'index'])->name('users.active-list');
Route::get('/user-show/{id}',[UserController::class,'show'])->name('user.show');

//emploer job offer
Route::get('/job-offers', [JobOffersContoller::class, 'index'])->name('job.offers.list');
Route::get('/job-offer-create',[JobOffersContoller::class,'jobOfferIndex'])->name('job.offer.create');
Route::get('/job-offer-show/{id}',[JobOffersContoller::class,'show'])->name('job.offer.show');
Route::post('/create',[JobOffersContoller::class,'create'])->name('job.offer.submit.create');
//report
Route::post('/user-report/{id}',[ReportController::class,'store'])->name('user.report');
//profile
Route::get('/profile-add',[ProfileController::class,'index'])->name('profile.add');
Route::post('/profile-create',[ProfileController::class,'create'])->name('profile.create');
Route::get('/profile-edit/{id}',[ProfileController::class,'edit'])->name('profile.edit');
Route::post('/profile-update/{profile}',[ProfileController::class,'update'])->name('profile.update');
Route::get('/profile-show/{id}',[ProfileController::class,'show'])->name('profile.show');
Route::post('/upload-photo',[ProfileController::class,'uploadProfile'])->name('upload.profile');


//message route
Route::get('/profile-message/{id}',[MessageController::class,'messageIndex'])->name('profile.message.view');
Route::get('/message-index',[MessageController::class,'index'])->name('message.index.view');
Route::post('/destroy-message/{id}',[MessageController::class,'destroy'])->name('destroy.message');
Route::get('/sent-items',[MessageController::class,'sentItems'])->name('sent.items');
Route::post('/message-sent/{id}',[MessageController::class, 'storeMessage'])->name('message.sent.store');
Route::get('/show-message/{message}',[MessageController::class,'show'])->name('show.message');
//dashboardMessage route

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
Route::get('/feed',[PostcardController::class,'index'])->name('job.feed');
Route::post('/add-postcard',[PostcardController::class,'addpostcard']);
Route::get('/fetch-postcard',[PostcardController::class,'fetchpostcard']);

//api

//landpage
Route::get('/landpage',[DashboardController::class,'landpage']);

//notification
Route::get('/fetchnotification',[PostcardController::class,'fetchnotification']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();


