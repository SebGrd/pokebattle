<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::get("/dresseur",[\App\Http\Controllers\DresseurController::class,"get"])
    ->middleware(['auth'])
    ->name("show_user");

Route::get("/dresseur/add", [\App\Http\Controllers\DresseurController::class,"addPokemon"])
    ->middleware(['auth'])
    ->name("add_pokemon_to_user");

Route::post("/dresseur/add",[\App\Http\Controllers\DresseurController::class,"add"])
    ->middleware(['auth'])
    ->name("pokemon_add") ;

Route::get("/dresseur/delete/{pokemon_id}",[\App\Http\Controllers\DresseurController::class,'deletePokemon'])
    ->middleware(['auth'])
    ->name('pokemon_delete') ;

Route::get("/dresseur/update/{pokemon_id}",[\App\Http\Controllers\DresseurController::class,'updatePokemon'])
    ->middleware(['auth'])
    ->name('pokemon_update') ;

Route::post("/dresseur/update/{pokemon_id}",[\App\Http\Controllers\DresseurController::class,'pokemonUpdate'])
    ->middleware(['auth'])
    ->name('pokemon_update_post') ;

Route::get('/battles', [\App\Http\Controllers\BattlesController::class,"get"] )
->middleware(['auth'])
->name('battles');

require __DIR__.'/auth.php';
