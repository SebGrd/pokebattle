<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DresseurController extends Controller
{
    public function get(Request $request) {
        $dresseur = User::find($request->dresseur_id) ;
        return view('dresseur_show',['dresseur'=>$dresseur]) ;
    }
}
