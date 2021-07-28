<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Historique des battles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul class="list-none">
                        @foreach($history as $item)
                            <li class="border mb-3 p-4">
                                <div class="flex items-start justify-between">
                                    <h2>Battle #{{ $item->id }}</h2>
                                    <span class="text-gray-600">{{ $item->created_at }}</span>
                                </div>
                                <div class="flex flex-col items-center justify-center">
                                    <span class="text-3xl font-bold">{{ $item->user->name }}</span>
                                    <div class="flex flex-col items-center justify-center">
                                        <h3 class="text-3xl text-center">{{ $item->pokemon->name }}</h3>
                                        <img src='/images/pokemon-{{$item->pokemon->pokemons_id}}.png'/>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
