@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
@endsection

@section('nav')
    @include('ui.adminnav')
@endsection

@section('content')
    <!-- item card -->
    <div class="md:flex shadow-lg  mx-6 md:mx-auto my-10 max-w-full h-68">
        <img class="h-full w-full md:w-1/3  object-cover rounded-lg rounded-r-none pb-5/6"
        {{-- Change in prod --}}
        {{-- src= {{ Storage::url("{$poll->image}") }} --}}
            src="{{$poll->image}}" alt="bag">
        <div class="w-full md:w-2/3 px-10 py-7 bg-white rounded-lg rounded-l-none">
            <div class="flex items-center">
                <h2 class="text-2xl my-3 text-gray-800 font-medium mr-auto">{{ $poll->title }}</h2>
                <p class="text-gray-800 font-semibold tracking-tighter mr-2">
                    {{ $poll->created_at->toFormattedDateString() }}
                <p
                    class="w-32 bg-white tracking-wide text-gray-800 font-bold rounded border-b-2 border-blue-500 hover:border-blue-600 hover:bg-blue-500 hover:text-white shadow-md py-2 px-4 mx-2 inline-flex items-center">
                    <span class="mx-auto">{{ $poll->coops->name }}</span>
                </p>
                </p>
            </div>
            <p class="text-sm text-gray-700 my-8">
                {!! $poll->description !!}
            </p>
            <div class="flex items-center justify-end my-10 top-auto">
                <span
                    class="tracking-wider text-white bg-yellow-500 px-4 py-2 text-sm rounded leading-loose mx-2 font-semibold"
                    title="">
                    <i class="fas fa-award" aria-hidden="true"></i> Total votos: {{ $total_votes }}
                </span>
                <p class="bg-white text-gray-800 px-4 py-2 rounded mr-auto"></p>
                @if (!$match)
                    <button id="votar"
                        class="tracking-wider text-white bg-blue-500 hover:bg-blue-700 px-4 py-2 text-sm rounded leading-loose mx-2 font-semibold"
                        title="">
                        <i class="fas fa-person-booth"></i> Votar
                    </button>
                @endif
                @if (auth()->user()->role == 'veedor')
                    <button id="resultado"
                        class="tracking-wider text-white bg-green-500 hover:bg-green-700 px-4 py-2 text-sm rounded leading-loose mx-2 font-semibold"
                        title="">
                        <i class="fas fa-poll"></i> Ver Resultados
                    </button>
                @endif
            </div>
        </div>
    </div>
    {{-- RESULTS --}}
    @if (auth()->user()->role == 'veedor')
        <div id="resultados" class="mx-auto bg-white shadow-lg rounded-lg my-10 px-4 py-4 max-w-md hidden">
            <div class="mb-1 tracking-wide px-4 py-4">
                <h2 class="text-gray-800 font-semibold mt-1 mb-3">{{ $total_votes }} Votos Totales</h2>
                <div class="border-b -mx-8 px-8 pb-3">
                    @foreach ($votes_by_option as $vote)
                        <div class="flex items-center justify-items-stretch mt-1">
                            <div class=" w-5/12 text-indigo-500 tracking-tighter">
                                <span>{{ $vote[0]->option->option }} {{ count($vote) }} votos</span>
                            </div>

                            <div class="w-6/12">
                                <div class="bg-gray-300 w-full rounded-lg h-2 my-3">
                                    <div style="width: {{ round((count($vote) / $total_votes) * 100) }}%"
                                        class="bg-indigo-600 rounded-lg h-2"></div>
                                </div>
                            </div>
                            <div class="w-1/12 text-gray-700 pl-3">
                                <span class="text-sm">{{ round((count($vote) / $total_votes) * 100) }}%</span>
                            </div>
                        </div><!-- first -->
                    @endforeach
                </div>
            </div>
            @if (auth()->user()->role == 'admin')
                <div class="w-full px-4 mx-auto text-center">
                    <h3 class="font-medium tracking-tight">Administrar votacion</h3>
                    <p class="text-gray-700 text-sm py-1">
                        Puedes deshabilitar esta votacion, o eliminarla.
                    </p>
                    <button class="bg-gray-100 border border-gray-400 px-3 py-1 rounded  text-gray-800 mt-2"><a
                            href="{{ route('adminPoll.index') }}"> Administrar</a></button>
                </div>
            @endif
        </div>
    @endif


    {{-- VOTATION FORM --}}
    @if (!$match)
        <div id="votacion" class="bg-green-500 p-5 rounded m-3 w-2/5 mx-auto hidden">
            <h2 class="text-2xl my-5 text-white uppercase font-bold text-center">Selecciona tu voto</h2>

            <form enctype="multipart/form-data" action="{{ route('polls.vote', $poll->id) }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="vote" class="block text-white text-sm font-bold mb-2">
                        Opcion:
                    </label>
                    <select name="vote" id="vote"
                        class="border w-full border-gray-300 py-2 px-3 rounded-md focus:outline-none focus:shadow-outline">
                        <option value='' selected>Elige...</option>
                        @foreach ($poll->options as $option)
                            <option class="px-3 py-2 cursor-pointer hover:bg-gray-200" value="{{ $option->id }}">
                                {{ $option->option }}
                            </option>
                        @endforeach
                    </select>

                    @error('vote')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <input type="submit"
                    class="bg-green-600 w-full hover:bg-green-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase"
                    value="Votar">
            </form>
        </div>
    @endif
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $("#votar").click(function() {
                $("#votacion").fadeToggle("slow", "linear");
            });
            $("#resultado").click(function() {
                $("#resultados").fadeToggle("slow", "linear");
            });
        });

    </script>
@endsection
