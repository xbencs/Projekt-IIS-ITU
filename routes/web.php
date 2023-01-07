<?php
//Created by Jasmína Csalová and Sebastián Bencsík

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\TeamController;
use App\Http\Livewire\Announcements;

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

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  

// all listings
Route::get('/', [ListingController::class, 'index']);

// show create form - listing
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// show store listing
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

//show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//edit submit to update, update listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

//manage listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// single listing -- MUST BE THE LAST ONE!!!!!
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//show register/create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//create a new user - storing him
Route::post('/users', [UserController::class, 'store']);

//log out of user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//SHOW LOGIN FROM
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//show user-edit form
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('auth');

//update submit new edited user data
Route::put('/users/{user}', [UserController::class, 'update'])->middleware('auth');

// show players-registered user
Route::get('/registered_users', [UserController::class, 'index']);

// show single players-registered users
Route::get('/users/{user}', [UserController::class, 'show']);

// create form - team
Route::get('/teams/create', [TeamController::class, 'create'])->middleware('auth');
//create a new team - storing him
Route::post('/teams', [TeamController::class, 'store'])->middleware('auth');
// show all teams
Route::get('/registered_teams', [TeamController::class, 'index']);

Route::put('/teams/{team}', [TeamController::class, 'update'])->middleware('auth');

Route::get('/teams/{team}/edit', [TeamController::class, 'edit'])->middleware('auth');

Route::get('/teams/{team}/manage', [TeamController::class, 'manage'])->middleware('auth');

Route::put('/teams/{team}/add', [TeamController::class, 'add'])->middleware('auth');

Route::delete('/teams/{team}/{user}', [TeamController::class, 'kick'])->middleware('auth');

// show single team
Route::get('/teams/{team}', [TeamController::class, 'show']);

//delete listing
Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware('auth');

//edit someone
Route::post('/users/edit_someone', [UserController::class, 'edit_someone']);

//show request form
Route::get('/listings/{listing}/request_join', [ListingController::class, 'request_join'])->middleware('auth');

//show request form
Route::get('/listings/{listing}/participants', [ListingController::class, 'participants']);

//showing my schedule
Route::get('/schedule', [UserController::class, 'schedule'])->middleware('auth');

// show announcements
Route::get('/welcome', [Announcements::class, 'index'])->middleware('auth');






