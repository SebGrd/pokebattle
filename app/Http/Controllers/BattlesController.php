<?php

namespace App\Http\Controllers;

use App\Models\Battle;
use App\Models\Pokemon;
use Illuminate\Http\Request;

class BattlesController extends Controller
{
    public function get(Request $request)
    {
        $battles = Battle::all();
        return view('battles', [
            'battles' => $battles,
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
