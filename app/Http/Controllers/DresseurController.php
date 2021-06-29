<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Pokemons;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DresseurController extends Controller
{
    public function get(Request $request) {

        $pokemons = Pokemon::where("user_id",Auth::id())->paginate(6) ;
        return view('dresseur_show',[
            'pokemons'=>$pokemons
        ]) ;
    }

    public function addPokemon(Request $request) {

        $pokes = [] ;
        foreach (Pokemons::all("name") as $pokemon) {
            $pokes[$pokemon->name] = $pokemon->name ;
        }
        return view('dresseurPokemon_add',[
            "pokemons"=>$pokes
        ]) ;
    }

    public function add(Request $request) {

        $this->validate($request,[
            "hp"=>"required",
            "attack"=>"required",
            "defense"=>"required",
            "speed"=>"required"
        ]);
        $count = 0 ;
        $count += $request->hp ;
        $count += $request->attack ;
        $count += $request->defense ;
        $count += $request->speed ;

        if($count == 10) {
            $pokemon = new Pokemon();
            $pokemon->user_id = Auth::id() ;
            $pokeId = \DB::table("pokemons")->where('name',$request->pokemon)->first() ;
            $pokemon->pokemons_id = $pokeId->id ;
            $pokemon->name = $request->pokemon;
            $pokemon->hp = $request->hp ;
            $pokemon->attack = $request->attack ;
            $pokemon->defense = $request->defense ;
            $pokemon->speed = $request->speed ;
            $pokemon->save() ;
            return redirect("dresseur")->with("succes","pokemon add with success ! ") ;

        } else {
            return back()->with("error","You have given more or less 10 points on pokemon stat") ;
        }

    }

    public function deletePokemon(Request $request){
        $pokemon = Pokemon::find($request->pokemon_id) ;
        $pokemon->delete() ;
        return redirect("dresseur")->with("success",'Pokemon has been remove with success!') ;
    }

    public function updatePokemon(Request $request){
        $pokemon = Pokemon::find($request->pokemon_id);
        return view("dresseurPokemon_update", [
            'pokemon'=>$pokemon
        ]);
    }
}
