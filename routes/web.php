<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\RegistrationController;
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

Route::get('/', [EventsController::class, 'index']);

//Events
Route::get('/events-dashboard', [EventsController::class, 'eventsDash']);
Route::get('/add-event', [EventsController::class, 'addEvent']);
Route::post('/store-event', [EventsController::class,'storeEvent']);
Route::get('/show-events', [EventsController::class, 'showEvents']);
Route::get('/more-information/{event}', [EventsController::class, 'moreInformation']);
Route::get('/registration/{event}', [EventsController::class, 'registerForEvent']);

//About
Route::get('/about', [EventsController::class, 'aboutDash']);

//Contacts
Route::get('/contacts', [EventsController::class, 'contactsDash']);

//Auth
Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Registration
Route::post('/event/{event}/registration', [RegistrationController::class,'create']);
Route::get('/confirm-registration', [RegistrationController::class, 'confirmRegistration']);

//Updates
Route::get('/your-events', [EventsController::class, 'yourEvents']);
Route::get('/update/event/{event}', [EventsController::class, 'updateEvent']);
Route::post('/update/{event}', [EventsController::class, 'storeUpdate']);
Route::get('/update/reservation/{registration}', [RegistrationController::class, 'storeStatus']);
Route::get('/cancel/reservation/{registration}', [RegistrationController::class, 'cancelStatus']);

//Delete
Route::get('/delete/event/{event}', [EventsController::class, 'deleteEvent']);
Route::get('/delete/reservation/{registration}', [RegistrationController::class, 'deleteRegistration']);
