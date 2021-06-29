<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    public function pokemon_type(){
        return $this->belongsTo(Pokemons::class,'pokemons_id');
    }
    protected $table = 'pokemon';

    public function battles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Battle::class, 'battle_pokemon','battle_id', 'pokemon_id');
    }
}
