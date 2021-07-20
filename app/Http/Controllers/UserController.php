<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function getPokemons(Request $request) {
        $pokemons = Pokemon::all()->where('user_id', '=', $request->user_id)->values();
        return $pokemons;
    }
}
