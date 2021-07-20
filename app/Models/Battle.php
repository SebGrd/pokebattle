<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Battle extends Model
{
    use HasFactory;
    protected $table = 'battles';

    public function pokemons(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Pokemon::class, 'battle_pokemon','battle_id', 'pokemon_id');
    }
}
