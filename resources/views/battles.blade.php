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
                    <div class="flex justify-between mb-3">
                        <h2>Battles</h2>
                        <a href="/battles/new" class="text-white bg-green-700 rounded p-1 hover:bg-green-600">Create a battle</a>
                    </div>
                    @foreach ($battles as $battle)
                       <div class="border rounded p-4 mb-3">
                           <h3>#{{$battle->id}} Battle at {{$battle->date}}</h3>
                           <ul class="flex justify-center">
                               @foreach($battle->pokemons as $pokemonInBattle)
                                   <li class="flex flex-col items-center justify-center">
                                       <span class="text-2xl font-bold">{{ $pokemonInBattle->user->name }}</span>
                                       <span>{{ ucfirst($pokemonInBattle->name) }}</span>
                                       <img src="{{ $pokemonInBattle->pokemon_type->image }}" alt="">
                                   </li>
                               @endforeach
                           </ul>
                           <div class="flex justify-center">
                               <a href="/battles/fight" class="text-white bg-red-700 p-1 px-4 rounded">Fight!</a>
                           </div>
                       </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
