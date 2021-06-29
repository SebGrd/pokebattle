<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <h1> Bienvenue dresseur <b>{{ $dresseur->name }} </b> ! </h1>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between" >
                        <h1 class="text-4xl">Liste des pokemons</h1>
                        <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full" href="{{route('add_pokemon_to_user',$dresseur->id)}}">Ajouter</a>
                    </div>
                    <ul>
                        @foreach ( $pokemons as $pokemon)
                            <li class="mb-3 border p-4">
                                <h2 class="text-2xl">{{$pokemon->name}}</h2>
                                <img src="{{$pokemon->image}}">
                            </li>
                        @endforeach
                    </ul>
                    <br>
                    {{$pokemons->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
