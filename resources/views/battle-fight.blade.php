<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Battle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-center mb-3">
                        <h2>Fight running!</h2>
                    </div>
                    <div class="flex items-center justify-center">
                        @foreach($battle->pokemons as $key => $battlePokemon)
                            <div class="flex flex-col items-center justify-center">
                                <img src='/images/pokemon-{{$battlePokemon->pokemons_id}}.png'/>
                                <h3>{{ ucfirst($battlePokemon->name) }}</h3>
                            </div>
                            @if($key === 0)
                                <div class="fight">
                                    <img class="mx-4"
                                         src="https://upload.wikimedia.org/wikipedia/commons/7/70/Street_Fighter_VS_logo.png"
                                         width="80px">
                                    <img class="fight__animation"
                                         src="https://supportivy.com/wp-content/uploads/2020/08/fire-pixel-art-Idees-designs-photo-32.gif">
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="progress-bar mt-6">
                        <div class="progress-bar__bar" id="bar"></div>
                    </div>
                    <div id="winner" class="hidden text-center flex-col flex justify-center items-center">
                        <span class="text-4xl">Le gagnant est {{ $winner->name }} avec son {{ $winnerPkmn['name'] }}!!!</span>
                        <a class="inline-block text-white bg-green-700 rounded p-1 hover:bg-green-600" href="{{route('battles-history')}}">Acceder à l'historique des matchs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const bar = document.getElementById('bar');
        bar.animate([
            // keyframes
            {
                width: '0%'
            },
            {
                width: '100%'
            }
        ], {
            // timing options
            duration: 5000,
        })
            .onfinish = () => {
            document.getElementById('winner').classList.remove('hidden')
            // window.location = '/battles';
        }

    </script>
</x-app-layout>
