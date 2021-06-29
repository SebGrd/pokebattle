<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <h1> Ajoute un pokemon à ta liste  <b>{{ Auth::user()->name }} </b> !  </h1>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('flash-message')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex-1 bg-white border-b border-gray-200">
                    {!! Form::open(['route'=> 'pokemon_add']) !!}
                    <div class="flex  justify-center flex-col">
                        {!! Form::label("Choose your pokemon !*") !!}
                        {!! Form::select('pokemon',$pokemons) !!}
                    </div>

                    <h1 class="text-2xl"> {!! Form::label("Select pokemons stats (10 points) : ") !!} </h1>
                    <div>
                        <div class="flex">
                            <b> {!! Form::label('Healing Points :*') !!} </b>
                            <div class="content-between ">
                                {!! Form::label("0") !!}
                                {!! Form::radio('hp','0') !!}
                                {!! Form::label("1") !!}
                                {!! Form::radio('hp','1') !!}
                                {!! Form::label("2") !!}
                                {!! Form::radio('hp','2') !!}
                                {!! Form::label("3") !!}
                                {!! Form::radio('hp','3') !!}
                                {!! Form::label("4") !!}
                                {!! Form::radio('hp','4') !!}
                                {!! Form::label("5") !!}
                                {!! Form::radio('hp','5') !!}
                            </div>
                        </div>
                        <div class="flex ">
                            <b class=""> {!! Form::label('Attack :*') !!} </b>
                            <div class="content-between ">
                                {!! Form::label("0") !!}
                                {!! Form::radio('attack','0') !!}
                                {!! Form::label("1") !!}
                                {!! Form::radio('attack','1') !!}
                                {!! Form::label("2") !!}
                                {!! Form::radio('attack','2') !!}
                                {!! Form::label("3") !!}
                                {!! Form::radio('attack','3') !!}
                                {!! Form::label("4") !!}
                                {!! Form::radio('attack','4') !!}
                                {!! Form::label("5") !!}
                                {!! Form::radio('attack','5') !!}
                            </div>
                        </div>

                        <div class="flex">
                            <b> {!! Form::label('Defense :*') !!} </b>
                            <div class="content-between ">
                                {!! Form::label("0") !!}
                                {!! Form::radio('defense','0') !!}
                                {!! Form::label("1") !!}
                                {!! Form::radio('defense','1') !!}
                                {!! Form::label("2") !!}
                                {!! Form::radio('defense','2') !!}
                                {!! Form::label("3") !!}
                                {!! Form::radio('defense','3') !!}
                                {!! Form::label("4") !!}
                                {!! Form::radio('defense','4') !!}
                                {!! Form::label("5") !!}
                                {!! Form::radio('defense','5') !!}
                            </div>
                        </div>

                        <div class="flex">
                            <b> {!! Form::label('Speed :*') !!} </b>
                            <div class="content-between ">
                                {!! Form::label("0") !!}
                                {!! Form::radio('speed','0') !!}
                                {!! Form::label("1") !!}
                                {!! Form::radio('speed','1') !!}
                                {!! Form::label("2") !!}
                                {!! Form::radio('speed','2') !!}
                                {!! Form::label("3") !!}
                                {!! Form::radio('speed','3') !!}
                                {!! Form::label("4") !!}
                                {!! Form::radio('speed','4') !!}
                                {!! Form::label("5") !!}
                                {!! Form::radio('speed','5') !!}
                            </div>
                        </div>
                    </div>


                    {!! Form::submit('Catch this pokemon ! ') !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
