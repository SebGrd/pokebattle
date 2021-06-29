<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\User;
use Illuminate\Http\Request;

class DresseurController extends Controller
{
    public function get(Request $request) {
        $dresseur = User::find($request->dresseur_id) ;
        $pokemons = Pokemon::where("user_id",$request->dresseur_id)->paginate(6) ;
        return view('dresseur_show',[
            'dresseur'=>$dresseur,
            'pokemons'=>$pokemons
        ]) ;
    }

    public function addPokemon(Request $request) {

    }
}
