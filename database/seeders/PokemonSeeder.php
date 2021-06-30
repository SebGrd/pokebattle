<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pokemons = [63, 34, 13, 4, 131, 142, 59, 33];
        $names = ['abra', 'nidoking', 'weedle', 'charmender', 'lapras', 'aerodactyl', 'arcanine', 'nidorino'];
        for ($i = 0; $i < 4; $i++) {
            $pokemon = new Pokemon();
            $pokemon->id = $i + 1;
            $pokemon->user_id = 1;
            $pokemon->pokemons_id = $pokemons[$i];
            $pokemon->name = $names[$i];
            $pokemon->hp = rand(0, 5);
            $pokemon->attack = rand(0, 5);
            $pokemon->defense = rand(0, 5);
            $pokemon->speed = rand(0, 5);
            $pokemon->save();
        }

        for ($i = 4; $i < 7; $i++) {
            $pokemon = new Pokemon();
            $pokemon->id = $i + 1;
            $pokemon->user_id = 2;
            $pokemon->pokemons_id = $pokemons[$i];
            $pokemon->name = $names[$i];
            $pokemon->hp = rand(0, 5);
            $pokemon->attack = rand(0, 5);
            $pokemon->defense = rand(0, 5);
            $pokemon->speed = rand(0, 5);
            $pokemon->save();
        }


    }
}
