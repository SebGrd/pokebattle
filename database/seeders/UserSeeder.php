<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use App\Models\User;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use App\Models\Pokemons;
use Illuminate\Support\Facades\Http;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->id = 1;
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->password = '$2y$10$flLsadvDThKBUToHk1ku6OjoYxuHCrEdFCijRk6NAH6axT2Ws.AQ2';
        $user->save();

        $user = new User();
        $user->id = 2;
        $user->name = 'Toto';
        $user->email = 'toto@gmail.com';
        $user->password = '$2y$10$flLsadvDThKBUToHk1ku6OjoYxuHCrEdFCijRk6NAH6axT2Ws.AQ2';
        $user->save();

    }
}
