<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a battle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="form">
                        {!! Form::open(['route'=> 'battle-add']) !!}
                        <h2 class="text-2xl">Choose your Pokemon</h2>
                        <div class="flex flex-wrap">
                            @foreach ($userPokemons as $pkmn)
                                <div class="w-1/2 p-2">
                                    <div class="flex items-center p-2 border rounded">
                                        {!! Form::radio('pokemon', $pkmn->name, false,[
                                            'id' => "pokemon-{$pkmn->name}",
                                            'class' => "m-3"
                                            ]) !!}
                                        {!! Form::label("pokemon-{$pkmn->name}", "
                                            <div class='battle-pokemon-card'>
                                                <h3 class='text-2xl uppercase font-bold'>{$pkmn->name}</h3>
                                                <div class='flex items-center justify-between w-full'>
                                                    <ul class='skills-list'>
                                                        <li>
                                                            <span class='label'>HP: </span>
                                                            <span class='points' points='{$pkmn->hp}'></span>
                                                        </li>
                                                        <li>
                                                            <span class='label'>Attack: </span>
                                                            <span class='points' points='{$pkmn->attack}'></span>
                                                        </li>
                                                        <li>
                                                            <span class='label'>Defense: </span>
                                                            <span class='points' points='{$pkmn->defense}'></span>
                                                        </li>
                                                        <li>
                                                            <span class='label'>Speed: </span>
                                                            <span class='points' points='{$pkmn->speed}'></span></
                                                        li>
                                                    </ul>
                                                    <img src='/images/pokemon-{$pkmn->pokemons_id}.png'/>
                                                </div>
                                            </div>
                                            ", ['class' => 'w-full'], false) !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <h2 class="text-2xl">Choose your opponent</h2>

                        <div class="flex  justify-center flex-col">
                            {{ var_dump($users) }}
                            {!! Form::label("Choose your opponent !") !!}
                            {!! Form::select('enemy',$users) !!}
                        </div>


                        {!! Form::submit('Fight ! ') !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
