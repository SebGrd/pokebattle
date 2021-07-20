<?php

namespace App\Http\Controllers;

use App\Models\Battle;
use App\Models\BattlePokemon;
use App\Models\Pokemon;
use App\Models\User;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BattlesController extends Controller
{
    public function get(Request $request)
    {
        return view('battles', [
            'battles' => Battle::all(),
        ]);
    }

    public function add(Request $request)
    {
        $names = array_map(function ($user) { return $user['name']; }, User::all('name')->toArray());
        $ids = array_map(function ($user) { return $user['id']; }, User::all('id')->toArray());
        $users = array_combine($ids, $names);
        unset($users[Auth::user()->id]);
        return view('battle-add', [
            'userPokemons' => Pokemon::where("user_id",Auth::id())->get(),
            'users' => $users,
        ]);
    }

    public function post(Request $request)
    {
         $this->validate($request,[
            "pokemonId"=>"required",
            "enemy"=>"required",
            "enemyPokemon"=>"required",
        ]);

        if ($request->enemy === 'default') redirect()->route('battle-add');

        $battle = new Battle();
        $battle->date = date("Y-m-d");
        $battle->save();
        // your pokemon
        $battlePokmon = new BattlePokemon();
        $battlePokmon->pokemon_id = $request->pokemonId;
        $battlePokmon->battle_id = $battle->id;
        $battlePokmon->save();
        // Enemy pokemon
        $battlePokmon = new BattlePokemon();
        $battlePokmon->pokemon_id = $request->enemyPokemon;
        $battlePokmon->battle_id = $battle->id;
        $battlePokmon->save();

        redirect()->route('battles');
    }
}
