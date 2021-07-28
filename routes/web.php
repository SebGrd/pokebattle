<?php

use Illuminate\Http\Request;
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

Route::get('/users/{user_id}/pokemons/', [\App\Http\Controllers\UserController::class, 'getPokemons'])
    ->middleware(['auth'])
    ->name('user-pokemons');

Route::get('/battles', [\App\Http\Controllers\BattlesController::class,"get"] )
->middleware(['auth'])
->name('battles');

Route::get('/battles/new', [\App\Http\Controllers\BattlesController::class,"add"] )
    ->middleware(['auth'])
    ->name('battle-add');

Route::get('/battles/history', [\App\Http\Controllers\BattlesController::class,"history"] )
    ->middleware(['auth'])
    ->name('battles-history');

Route::post('/battles/new', [\App\Http\Controllers\BattlesController::class,"post"] )
    ->middleware(['auth'])
    ->name('battle-add');

Route::get('/battles/fight/{battle_id}', [\App\Http\Controllers\BattlesController::class, "fight"])
    ->middleware(['auth'])
    ->name('fight');

Route::get('/images/pokemon-{id}.png', function (Request $request) {
    return redirect("https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/{$request->id}.png");
});

require __DIR__.'/auth.php';
