<?php

namespace App\Http\Controllers;

use App\Models\Battle;
use App\Models\Pokemon;
use App\Models\User;
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
        $battles = Battle::all();
        return view('battle-add', [
            'battles' => $battles,
        ]);
    }
}
