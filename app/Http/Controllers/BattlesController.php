<?php

namespace App\Http\Controllers;

use App\Models\Battle;
use App\Models\BattlePokemon;
use App\Models\Pokemon;
use App\Models\Result;
use App\Models\User;
use Carbon\Traits\Date;
use Illuminate\Database\Eloquent\Model;
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

        return redirect()->route('battles');
    }

    public function fight(Request $request) {

        $battle = Battle::all()->where('id', '=', $request->battle_id)->first();
        $pokemonsBattle = BattlePokemon::all()->where('battle_id', '=', $request->battle_id);
        $scoreP1 = 0;
        $scoreP2 = 0;
        $pokemonFightings = $battle->pokemons->toArray();

        if ($pokemonFightings[0]['hp'] > $pokemonFightings[1]['hp']) {
            $scoreP1 += 1;
        } else if ($pokemonFightings[0]['hp'] < $pokemonFightings[1]['hp']) {
            $scoreP2 += 1;
        }
        if ($pokemonFightings[0]['attack'] > $pokemonFightings[1]['attack']) {
            $scoreP1 += 1;
        } else if ($pokemonFightings[0]['attack'] < $pokemonFightings[1]['attack']) {
            $scoreP2 += 1;
        }
        if ($pokemonFightings[0]['defense'] > $pokemonFightings[1]['defense']) {
            $scoreP1 += 1;
        } else if ($pokemonFightings[0]['defense'] < $pokemonFightings[1]['defense']) {
            $scoreP2 += 1;
        }
        if ($pokemonFightings[0]['speed'] > $pokemonFightings[1]['speed']) {
            $scoreP1 += 1;
        } else if ($pokemonFightings[0]['speed'] < $pokemonFightings[1]['speed']) {
            $scoreP2 += 1;
        }
        if ($scoreP1 > $scoreP2) { //p1 wins
            $winner = User::all()->where('id', '=', $pokemonFightings[0]['user_id'])->first();
            $winnerPkmn = $pokemonFightings[0];
            $result = new Result();
            $result->user_id = $pokemonFightings[0]['user_id'];
            $result->pokemon_id = $pokemonFightings[0]['id'];
            $result->save();
        }
        if ($scoreP1 < $scoreP2) { //p2 wins
            $winner = User::all()->where('id', '=', $pokemonFightings[1]['user_id'])->first();
            $winnerPkmn = $pokemonFightings[1];
            $result = new Result();
            $result->user_id = $pokemonFightings[1]['user_id'];
            $result->pokemon_id = $pokemonFightings[1]['id'];
            $result->save();
        }
        if ($scoreP1 === $scoreP2) { // if tie random pick
            $index = rand(0, 1);
            $winner = User::all()->where('id', '=', $pokemonFightings[$index]['user_id'])->first();
            $winnerPkmn = $pokemonFightings[$index];
            $result = new Result();
            $result->user_id = $pokemonFightings[$index]['user_id'];
            $result->pokemon_id = $pokemonFightings[$index]['id'];
            $result->save();
        }

        $battle->delete();
        foreach ($pokemonsBattle as $pokemonBattle) {
            $pokemonBattle->delete();
        }


        return view('battle-fight', [
            'battle' => $battle,
            'battlesPokemon' => $pokemonsBattle,
            'winner' => $winner,
            'winnerPkmn' => $winnerPkmn,
        ]);
    }

    public function history() {
        $history = Result::all()->sortByDesc('created_at');
        return view('battles-history', [
            'history' => $history,
        ]);
    }
}
