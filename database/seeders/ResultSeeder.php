<?php

namespace Database\Seeders;

use App\Models\Result;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $result = new Result();
        $result->id = 1;
        $result->user_id = 1;
        $result->pokemon_id = 2;
        $result->save();

        $result = new Result();
        $result->id = 2;
        $result->user_id = 1;
        $result->pokemon_id = 1;
        $result->save();

        $result = new Result();
        $result->id = 3;
        $result->user_id = 2;
        $result->pokemon_id = 6;
        $result->save();
    }
}
