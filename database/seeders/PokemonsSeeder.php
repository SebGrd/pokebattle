<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use App\Models\Pokemons;
use Illuminate\Support\Facades\Http;

class PokemonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->apiCall('https://pokeapi.co/api/v2/pokemon?limit=200');
        foreach ($data['results'] as $pkmn) {
            $pokemonProperties = $this->apiCall($pkmn['url']);
            $pokemon = new Pokemons();
            $pokemon->name = $pkmn['name'];
            $pokemon->image = $pokemonProperties['sprites']['front_default'];
            $pokemon->save();
        }

    }

    private function apiCall($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $res = json_decode(curl_exec($ch),true);
        curl_close($ch);
        return $res;
    }
}
