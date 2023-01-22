<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ListingController::class, 'index']);

Route::middleware(['auth'])->group(function(){

    Route::get('/listings/create', [ListingController::class, 'create']);

    Route::post('/listings', [ListingController::class, 'store']);

    Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

    Route::put('/listings/{listing}', [ListingController::class, 'update']);

    Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

    //manage listings
    Route::get('/listings/manage', [ListingController::class, 'manage']);


    Route::post('/logout', [UserController::class, 'logout']);

});





Route::get('/listings/{listing}',[ListingController::class, 'show']);


Route::middleware(['guest'])->group(function(){
// users
Route::get('/register', [UserController::class, 'create']);

// show login form
Route::get('/login', [UserController::class, 'login'])->name('login');

});


Route::post('/users', [UserController::class, 'store']);


// login user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);


