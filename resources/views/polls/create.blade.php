@extends('layouts.app')

@section('styles')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">

@endsection

@section('nav')
    @include('ui.adminnav')
@endsection

@section('content')
    <!-- Create Form Container -->
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-3xl">
                <div class="flex flex-col break-words bg-white border border-2 shadow-md mt-10 mb-10">
                    <div class="bg-gray-300 text-gray-700 uppercase text-center py-3 px-6 mb-0">
                        Crear Votacion
                    </div>
                    <!-- Create Form -->
                    <form class="py-8 px-5" method="POST" action="{{ route('polls.store') }}" enctype="multipart/form-data"
                        novalidate>
                        @csrf

                        <!-- Title Input Form -->
                        <div class="flex flex-wrap mb-6">
                            <label for="title" class="block text-gray-700 text-sm mb-2">Titulo Votacion</label>
                            <input id="title" type="text"
                                class="p-3 bg-gray-100 roundend form-input w-full @error('title') border-red-500 border  @enderror"
                                name="title" value="{{ old('title') }}" autocomplete="title"
                                placeholder="Agrega un titulo a tu votacion" autofocus>

                            @error('title')
                                <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- End Title Input Form -->

                        <!-- Description Input Form -->
                        <div class="flex flex-wrap mb-6">
                            <label for="description" class="block text-gray-700 text-sm mb-2">Descripcion</label>
                            <input type="hidden" id="description" name="description" value="{{ old('description') }}">
                            <trix-editor class="w-full @error('description') is-invalid @enderror" input="description"
                                placeholder="Agrega una descripcion a tu votacion"></trix-editor>

                            @error('description')
                                <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- End Description Input Form -->

                        <!-- Coop Input Form -->
                        <div class="flex flex-wrap mb-6">
                            <label for="coop_id" class="block text-gray-700 text-sm mb-2">Cooperativa</label>
                            <input type="text" readonly name="coop_id" class="p-3 bg-gray-100 roundend form-input w-full "
                                value="{{ auth()->user()->coop->name }}">
                        </div>
                        <!-- End Coop Input Form -->

                        <!-- Options Input Form -->
                        <div class="flex flex-wrap mb-6">
                            <div class="table-responsive w-full">
                                <table class="table w-full" id="dynamic_field">
                                    <label for="option" class="block text-gray-700 text-sm mb-2">Opciones</label>
                                    <tr>
                                        <td class="w-2/3">
                                            <input type="text" name="option[]" placeholder="Opcion 1"
                                                class="p-3 bg-gray-100 roundend form-input w-full @error('option') border-red-500 border  @enderror" />
                                        </td>
                                        <td class="w-24 text-center">
                                            <button type="button" name="add" id="add"
                                                class="bg-green-500 hover:bg-green-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase">Agregar
                                                Opcion</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- End Option Input Form -->

                        <!-- File Input Form -->
                        <div class="flex flex-wrap mb-6">
                            <label for="image" class="block text-gray-700 text-sm mb-2">Sube una imagen</label>
                            <input type="file" name="image" id="image"
                                class="p-3 bg-gray-100 roundend form-input w-full @error('image') border-red-500 border  @enderror">
                            @error('image')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- End File Input Form -->

                        <!-- Submit Input Form -->
                        <div class="flex flex-wrap">
                            <button type="submit"
                                class="bg-green-500 w-full hover:bg-green-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase">
                                Crear Votacion
                            </button>
                        </div>
                        <!-- End Submit Input Form -->
                    </form>
                    <!-- End Create Form -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Create Form Container -->

@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#trix-toolbar-1").addClass("max-w-min");
            var i = 1;
            $('#add').click(function() {
                i++;
                $('#dynamic_field').append('<tr id="row' + i +
                    '"><td><input type="text" name="option[]" placeholder="Opcion ' + i +
                    '" class="p-3 bg-gray-100 roundend form-input w-full @error('
                    option ') border-red-500 border  @enderror" /></td><td><button type="button" name="remove" id="' +
                    i +
                    '" class="border border-red-500 bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline btn_remove">X</button></td></tr>'
                    );
            });
            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });
        });

    </script>
    <script type="text/javascript" src="{{ asset('js/trix.js') }}" defer></script>
@endsection
