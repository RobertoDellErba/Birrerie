<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\BreweryController;

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


Route::get('/', [PublicController::class,'home'])->name('home');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('log');

Route::get('/contattaci', [PublicController::class,'about'])->name('about_us');
Route::post('/invio_form', [PublicController::class,'send'])->name('send');
// Route::get('/thank_you', [PublicController::class,'thankyou'])->name('thank_you');

Route::get('/team', [PublicController::class,'team'])->name('team');

Route::get('/search', [PublicController::class,'search'])->name('search');


//Route per breweries
Route::get('/birrerie', [PublicController::class,'breweries'])->name('breweries');
Route::post('/birrerie/store', [BreweryController::class,'store'])->name('breweries.store');
Route::get('/birrerie/{id}/{name}', [PublicController::class,'show'])->name('breweries.show');
Route::post('/birrerie/{id}/comments', [PublicController::class,'comments'])->name('breweries.comments');

Route::post('/birrerie/{id}/approve', [BreweryController::class,'approve'])->name('breweries.approve');

//collabora con noi 
Route::get('/team/form', [TeamController::class,'form'])->name('team.form');
Route::post('/team/new', [TeamController::class,'new'])->name('team.new');

Route::post('/birrerie/{id}/beers/sync', [BreweryController::class,'beersSync'])->name('breweries.beers.sync');

//Lat e lon viaggiano su questa route
Route::get('/markers', [PublicController::class,'markers'])->name('markers');
