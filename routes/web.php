<?php

use App\Models\Listing;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AssistantController;
use App\Http\Controllers\TreatmentController;
use Symfony\Component\HttpFoundation\Response;

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

//all listings:
Route::get('/', function(){return view('welcome');})->middleware('auth');

Route::resource(name:'listings', controller:ListingController::class)->names(names:'listings')->middleware('auth');
Route::resource(name:'patients', controller:PatientController::class)->names(names:'patients')->middleware('auth');
Route::resource(name:'doctors', controller:DoctorController::class)->names(names:'doctors')->middleware('auth');
Route::resource(name:'assistants', controller:AssistantController::class)->names(names:'assistants')->middleware('auth');
Route::resource(name:'treatments', controller:TreatmentController::class)->names(names:'treatments')->middleware('auth');

// //show create form
// Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');
// //store listing data
// Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');
// //show edit form
// Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');
// //update listing
// Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');
// //delete listing
// Route::delete('/listings/{listing}', [ListingController::class, 'delete'])->middleware('auth');
// //single Listing:
// Route::get('/listings/{listing}', [ListingController::class, 'show'])->middleware('auth');


//USERS
//Show register/create form
Route::get('/register', [UserController::class, 'create'])->middleware('auth');

//Create new user
Route::post('/users', [UserController::class, 'store'])->middleware('auth');

// Log User Out
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);


//different users:

/*
Route::get('/hello', function(){
    return response('<h1>Hello mai</h1>')
    ->header ('Content-Type', 'text/plain')
    ->header('foo', 'bar');
});

Route::get('/posts/{id}', function($id){
    return response('Post ' . $id);
})->where('id', '[0-9]+');

Route::get('/search', function(Request $request){
    $request->name . ' ' . $request->city;
});*/