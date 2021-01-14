@extends('layouts.app')

@section('nav')
    @include('ui.adminnav')
@endsection


@section('messages')
    @if (\Session::has('success'))
        <!-- Alert Success -->
        <div class="bg-green-200 px-6 py-4 mx-2 my-2 rounded-md text-lg flex items-start w-full">
            <svg viewBox="0 0 24 24" class="text-green-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
                <path fill="currentColor" d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z"></path>
            </svg>
            <span class="text-green-800"> {!! \Session::get('success') !!}.</span>
        </div>
        <!-- End Alert Success --> 
    @endif
@endsection

@section('content')
    <main class="flex-1 flex flex-col bg-gray-100 dark:bg-gray-700 transition duration-500 ease-in-out overflow-y-auto">
        <div class="mx-10 my-2">
            <nav class="flex flex-row justify-end border-b dark:border-gray-600 dark:text-gray-400 transition duration-500 ease-in-out">
                <div class="flex items-center select-none mx-60 my-2">
                    <span class="hover:text-green-500 dark-hover:text-green-300 cursor-pointer mr-3 transition duration-500 ease-in-out">
                        <svg viewBox="0 0 512 512" class="h-5 w-5 fill-current">
                            <path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                        </svg>
                    </span>
                    <input class="w-12 bg-transparent focus:outline-none" placeholder="Search" />
                </div>
            </nav>

            <h2 class="my-4 text-4xl font-semibold dark:text-gray-400">
                Usuarios de <span class="text-green-500 dark:text-green-200">{{auth()->user()->coop->name}}</span>
            </h2>

            <div class="pb-2 flex items-center justify-between text-gray-600 dark:text-gray-400 border-b dark:border-gray-600">
                <!-- Header -->
                <div>
                    <span>
                        <span class="text-green-500 dark:text-green-200">
                            {{count($users)}}
                        </span>
                        users
                    </span>
                </div>
            </div>
            <div class="mt-6 flex justify-between text-gray-600 dark:text-gray-400">
                <!-- List sorting -->
                <div class="ml-10 pl-2 flex capitalize">
                    <!-- Left side -->
                    <span class="ml-8 flex items-center">
                        Usuario
                        <svg class="ml-1 h-5 w-5 fill-current text-green-500 dark:text-green-200" viewBox="0 0 24 24">
                            <path d="M18 21l-4-4h3V7h-3l4-4 4 4h-3v10h3M2 19v-2h10v2M2 13v-2h7v2M2 7V5h4v2H2z"></path>
                        </svg>
                    </span>
                    <span class="ml-24 flex items-center">
                        Email
                        <svg class="ml-1 h-5 w-5 fill-current" viewBox="0 0 24 24">
                            <path d="M18 21l-4-4h3V7h-3l4-4 4 4h-3v10h3M2 19v-2h10v2M2 13v-2h7v2M2 7V5h4v2H2z"></path>
                        </svg>
                    </span>
                </div>

            </div>
            @foreach($users as $user)
                <div class="mt-2 flex px-4 py-4 justify-between @if($user->status == 'disabled') bg-gray-200 @else bg-white @endif dark:bg-gray-600 shadow-xl rounded-lg cursor-pointer ">
                    <!-- Card -->
                    <div class="flex justify-between">
                        <!-- Left side -->
                        <img class="h-12 w-12 rounded-full object-cover" src="https://inews.gtimg.com/newsapp_match/0/8693739867/0" alt="" />
                        
                        <div class="ml-4 flex flex-col capitalize text-gray-600 dark:text-gray-400">
                            <span>Nombre</span>
                            <span class="mt-2 text-black dark:text-gray-200">
                                {{$user->name}}
                            </span>
                        </div>

                        <div class="ml-12 flex flex-col capitalize text-gray-600 dark:text-gray-400">
                            <span>Email</span>
                            <span class="mt-2 text-black dark:text-gray-200">
                                {{$user->email}}
                            </span>
                        </div>
                    </div>

                    <div class="flex">
                        <!-- Rigt side -->
                        <div class="mr-16 flex flex-col capitalize text-gray-600 dark:text-gray-400">
                            <span>Creado</span>
                            <span class="mt-2 text-black dark:text-gray-200">
                                {{ $user->created_at->toFormattedDateString() }}
                            </span>
                        </div>

                        <div class="mr-16 flex flex-col capitalize text-gray-600 dark:text-gray-400">
                            <span>Rol</span>
                            <span class="mt-2 text-black dark:text-gray-200">
                                {{$user->role}}
                            </span>
                        </div>

                        <div class="mr-16 flex flex-col capitalize text-gray-600 dark:text-gray-400">
                            <span>Estado</span>
                            <span class="mt-2 @if($user->status == 'disabled') text-red-600 dark:text-red-400 @else text-black dark:text-gray-200 @endif">
                                {{$user->status}}
                            </span>
                        </div>

                        <div class="mr-8 flex capitalize text-gray-600 dark:text-gray-400">
                            <form action="">
                            <button type="button" id="editar" class="flex items-center focus:outline-none border rounded-full py-2 px-6 leading-none border-gray-500 dark:border-gray-600 select-none hover:bg-gray-400 hover:text-white dark-hover:text-gray-200">
                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                                <span>Editar</span>
                            </button>
                        </form>
                            <form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="flex items-center ml-4 focus:outline-none border rounded-full py-2 px-6 leading-none border-red-500 dark:border-blue-600 select-none hover:bg-red-400 hover:text-white dark-hover:text-gray-200">
                                    <svg class="h-5 w-5 mr-2 text-red-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                    <span>Eliminar</span>
                                </button>
                            </form>
                        </div>

                    </div>

                </div>
                <div class="px-3 py-4 mx-auto hidden w-4/6" id="edicion">
                    <form  method="POST" action="{{ route('users.update', ['id' => $user->id]) }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')
                    <table class="w-2/4 text-md bg-white shadow-md rounded mb-4">
                        <tbody>
                            <tr class="border-b">
                                <th class="text-left p-3 px-5">Estado</th>
                                <th class="text-left p-3 px-5">Rol</th>
                                <th></th>
                            </tr>
                            <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                <td class="p-3 px-5">
                                    <select name="status" class="bg-transparent">
                                        <option selected value=" ">--- Selecciona ---</option>
                                        <option value="Enabled">Enabled</option>
                                        <option value="Disabled">Disabled</option>
                                    </select>
                                </td>
                                <td class="p-3 px-5">
                                    <select name="role" class="bg-transparent capitalize">
                                        <option selected value=" ">--- Selecciona ---</option>
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                        <option value="veedor">Veedor</option>
                                    </select>
                                </td>
                                <td class="p-3 px-5 flex justify-end">
                                    <button type="submit" class="bg-green-500 w-full hover:bg-green-700 text-gray-100 p-2 focus:outline-none focus:shadow-outline uppercase">Editar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </form>
                </div>
            @endforeach
        </div>
    </main>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $("#editar").click(function() {
                $("#edicion").fadeToggle("slow", "linear");
            });
        });
    </script>
@endsection