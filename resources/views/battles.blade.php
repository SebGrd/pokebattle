<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Battles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2>Battles</h2>
                    @foreach ($battles as $battle)
                        <h3 class="font-bold">Battle #{{$battle->id}} at {{$battle->date}}</h3>
                        <ul>
                            @foreach($battle->pokemons as $pokemonInBattle)
                                <li>
                                    <span>Pokemon: {{ \App\Models\Pokemon::find($pokemonInBattle->id)->name  }}</span>
                                    <img src="{{ \App\Models\Pokemon::find($pokemonInBattle->id)->pokemon_type->image }}" alt="">
                                </li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
