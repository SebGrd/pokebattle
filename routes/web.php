<?php

use App\Models\Battle;
use App\Models\BattlePokemon;
use App\Models\Pokemon;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get("/dresseur/{dresseur_id}",[\App\Http\Controllers\DresseurController::class,"get"])
    ->middleware(['auth'])
    ->name("show_user");

Route::get("/dresseur/{dresseur_id}/add", [\App\Http\Controllers\DresseurController::class,"addPokemon"])
    ->middleware(['auth'])
    ->name("add_pokemon_to_user");

Route::get('/battles', function () {
    echo '<h2>Pokemons : </h2>';
    echo '<br>';
    echo '<h2>Battles : </h2>';
    $battles = Battle::all();
    foreach ($battles as $battle) {
        echo '<fieldset>';
        echo '<h3>Battle '.$battle->id.' at '.$battle->date.': </h3><br>';
        foreach ($battle->pokemons as $pokemonInBattle) {
            echo $pokemonInBattle->id;
            echo '<li>Pokemon: '.$pokemonInBattle->pokemons_id . '</li>';
        }
        echo '</fieldset><br>';
    }
    echo '<br>';
});

require __DIR__.'/auth.php';
