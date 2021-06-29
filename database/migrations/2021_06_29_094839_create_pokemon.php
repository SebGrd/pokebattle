<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemon', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger("user_id");
            $table->foreign("user_id")->references("id")->on("user")->onDelete("cascade");
            $table->unsignedInteger("pokemons_id");
            $table->foreign("pokemons_id")->references('id')->on("pokemons")->onDelete('cascade');
            $table->string("name")->nullable(false);
            $table->unsignedSmallInteger("hp")->default(0)->nullable(false);
            $table->unsignedSmallInteger("attack")->default(0)->nullable(false);
            $table->unsignedSmallInteger("defense")->default(0)->nullable(false);
            $table->unsignedSmallInteger("speed")->default(0)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokemon');
    }
}
