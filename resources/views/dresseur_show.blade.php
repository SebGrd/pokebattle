<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <h1> Bienvenue dresseur <b>{{ Auth::user()->name  }} </b> ! </h1>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('flash-message')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between" >
                        <h1 class="text-4xl">Liste des pokemons</h1>
                        <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full" href="{{route('add_pokemon_to_user')}}">Ajouter</a>
                    </div>
                    <ul>
                        @foreach ( $pokemons as $pokemon)
                            <li class="mb-3 border p-4 flex">
                                <h2 class="text-2xl ">{{$pokemon->name}}</h2>
                                <img src="{{$pokemon->pokemon_type->image}}">
                                <a href="{{route('pokemon_update',$pokemon->id)}}"><span class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative">Edit</span></a>
                                <a href="{{route('pokemon_delete',$pokemon->id)}}"><span class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">×</span></a>
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
