<?php

namespace Database\Seeders;

use App\Models\Battle;
use App\Models\BattlePokemon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class BattlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [1, 2];
        $battle = new Battle();
        $battle->id = 1;
        $battle->date = '2021-07-21';
        $battle->save();

        $battlePokemon = new BattlePokemon();
        $battlePokemon->id = 1;
        $battlePokemon->pokemon_id = 1;
        $battlePokemon->battle_id = 1;
        $battlePokemon->save();

        $battlePokemon = new BattlePokemon();
        $battlePokemon->id = 2;
        $battlePokemon->pokemon_id = 5;
        $battlePokemon->battle_id = 1;
        $battlePokemon->save();


    }
}
