<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <h1> <b>{{$pokemon->name}}</b> a de mauvaise stats  <b>{{ Auth::user()->name }} </b> ! Il est temps de changer tout ça  </h1>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('flash-message')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex-1 bg-white border-b border-gray-200">
                    {!! Form::open(['route'=> 'pokemon_add']) !!}

                    <h1 class="text-2xl"> {!! Form::label("Select pokemons stats (10 points) : ") !!} </h1>
                    <div>
                        <div class="flex">
                            <b> {!! Form::label('Healing Points :*') !!} </b>
                            <div class="content-between ">
                                {!! Form::label("0") !!}
                                {!! Form::radio('hp','0',$pokemon->hp == 0) !!}
                                {!! Form::label("1") !!}
                                {!! Form::radio('hp','1',$pokemon->hp == 1) !!}
                                {!! Form::label("2") !!}
                                {!! Form::radio('hp','2',$pokemon->hp == 2) !!}
                                {!! Form::label("3") !!}
                                {!! Form::radio('hp','3',$pokemon->hp == 3) !!}
                                {!! Form::label("4") !!}
                                {!! Form::radio('hp','4',$pokemon->hp == 4) !!}
                                {!! Form::label("5") !!}
                                {!! Form::radio('hp','5',$pokemon->hp == 5) !!}
                            </div>
                        </div>
                        <div class="flex ">
                            <b class=""> {!! Form::label('Attack :*') !!} </b>
                            <div class="content-between ">
                                {!! Form::label("0") !!}
                                {!! Form::radio('attack','0',$pokemon->attack == 0) !!}
                                {!! Form::label("1") !!}
                                {!! Form::radio('attack','1',$pokemon->attack == 1) !!}
                                {!! Form::label("2") !!}
                                {!! Form::radio('attack','2',$pokemon->attack == 2) !!}
                                {!! Form::label("3") !!}
                                {!! Form::radio('attack','3',$pokemon->attack == 3) !!}
                                {!! Form::label("4") !!}
                                {!! Form::radio('attack','4',$pokemon->attack == 4) !!}
                                {!! Form::label("5") !!}
                                {!! Form::radio('attack','5',$pokemon->attack == 5) !!}
                            </div>
                        </div>

                        <div class="flex">
                            <b> {!! Form::label('Defense :*') !!} </b>
                            <div class="content-between ">
                                {!! Form::label("0") !!}
                                {!! Form::radio('defense','0',$pokemon->defense == 0) !!}
                                {!! Form::label("1") !!}
                                {!! Form::radio('defense','1',$pokemon->defense == 1) !!}
                                {!! Form::label("2") !!}
                                {!! Form::radio('defense','2',$pokemon->defense == 2) !!}
                                {!! Form::label("3") !!}
                                {!! Form::radio('defense','3',$pokemon->defense == 3) !!}
                                {!! Form::label("4") !!}
                                {!! Form::radio('defense','4',$pokemon->defense == 4) !!}
                                {!! Form::label("5") !!}
                                {!! Form::radio('defense','5',$pokemon->defense == 5) !!}
                            </div>
                        </div>

                        <div class="flex">
                            <b> {!! Form::label('Speed :*') !!} </b>
                            <div class="content-between ">
                                {!! Form::label("0") !!}
                                {!! Form::radio('speed','0',$pokemon->speed == 0) !!}
                                {!! Form::label("1") !!}
                                {!! Form::radio('speed','1',$pokemon->speed == 1) !!}
                                {!! Form::label("2") !!}
                                {!! Form::radio('speed','2',$pokemon->speed == 2) !!}
                                {!! Form::label("3") !!}
                                {!! Form::radio('speed','3',$pokemon->speed == 3) !!}
                                {!! Form::label("4") !!}
                                {!! Form::radio('speed','4',$pokemon->speed == 4) !!}
                                {!! Form::label("5") !!}
                                {!! Form::radio('speed','5',$pokemon->speed == 5) !!}
                            </div>
                        </div>
                    </div>


                    {!! Form::submit('Save this pokemon ! ') !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
