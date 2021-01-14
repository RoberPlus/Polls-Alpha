@extends('layouts.app')

@section('nav')
    @include('ui.adminnav')
@endsection


@section('messages')
    @if (\Session::has('success'))
    <!-- Alert Success -->
        <div
            class="bg-green-200 px-6 py-4 mx-2 my-2 rounded-md text-lg flex items-start w-full"
            >
        <svg
            viewBox="0 0 24 24"
            class="text-green-600 w-5 h-5 sm:w-5 sm:h-5 mr-3"
            >
            <path
                fill="currentColor"
                d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z"
                ></path>
        </svg>
        <span class="text-green-800"> {!! \Session::get('success') !!}.</span>
        </div>
        <!-- End Alert Success --> 
    @endif
@endsection

@section('content')

    <div class="h-screen flex">
        <main class="flex-1 bg-gray-200 dark:bg-gray-900 overflow-y-auto transition duration-500 ease-in-out">
            <div class="px-24 py-5 text-gray-700 dark:text-gray-500 transition duration-500 ease-in-out">
                <h2 class="text-4xl font-medium capitalize">Votaciones</h2>
                <div class="mt-1 mb-4 flex items-center justify-between">
                    <span class="text-sm">
                        Total votaciones:
                        <strong>{{ count($polls) }}</strong>
                    </span>
                    <div class="flex items-center select-none">
                        <span class="hover:text-pink-500 cursor-pointer mr-3">
                            <svg viewBox="0 0 512 512" class="h-5 w-5 fill-current">
                                <path d="M505 442.7L405.3
                343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7
                44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1
                208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4
                2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9
                0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7
                0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0
                128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                            </svg>
                        </span>
                        <input class="bg-transparent focus:outline-none" placeholder="Buscar" />
                    </div>
                    <div class="flex items-center select-none">
                        <span>Filter</span>
                        <button class="ml-3 bg-gray-400 dark:bg-gray-600
              dark:text-gray-400 rounded-full p-2 focus:outline-none
              hover:text-pink-500 hover:bg-pink-300 transition
              duration-500 ease-in-out">
                            <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24">
                                <path d="M14 12v7.88c.04.3-.06.62-.29.83a.996.996 0
                01-1.41 0l-2.01-2.01a.989.989 0
                01-.29-.83V12h-.03L4.21 4.62a1 1 0
                01.17-1.4c.19-.14.4-.22.62-.22h14c.22 0
                .43.08.62.22a1 1 0 01.17 1.4L14.03 12H14z"></path>
                            </svg>
                        </button>
                        <button class="ml-2 bg-gray-400 dark:bg-gray-600
              dark:text-gray-400 rounded-full p-2 focus:outline-none
              hover:text-pink-500 hover:bg-pink-300 transition
              duration-500 ease-in-out">
                            <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24">
                                <path d="M18 21l-4-4h3V7h-3l4-4 4 4h-3v10h3M2
                19v-2h10v2M2 13v-2h7v2M2 7V5h4v2H2z"></path>
                            </svg>
                        </button>
                        <button class="ml-2 bg-gray-400 dark:bg-gray-600
              dark:text-gray-400 rounded-full p-2 focus:outline-none
              hover:text-pink-500 hover:bg-pink-300 transition
              duration-500 ease-in-out">
                            <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24">
                                <path d="M12 4a4 4 0 014 4 4 4 0 01-4 4 4 4 0 01-4-4 4
                4 0 014-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21
                3.58-4 8-4z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="border dark:border-gray-700 transition duration-500 ease-in-out"></div>
                {{-- Votacion --}}
                <div class="flex flex-col mt-2">
                    @foreach ($polls as $poll)
                        <div class="flex flex-row mt-2">
                            <div class="flex w-full items-center justify-between bg-white
                                        dark:bg-gray-800 px-8 py-6 border-l-4 @if($poll->status == 'active')border-green-500 @else border-gray-500 @endif
                                        dark:border-green-300">
                                <!-- card -->
                                <div class="flex">
                                    <img class="h-12 w-12 rounded-full object-cover"
                                        src="{{-- {{ Storage::url("{$poll->image}") }} --}}" alt="infamous" />

                                    <div class="flex flex-col ml-6">
                                        <span class="text-lg font-bold">{{ $poll->title }}</span>
                                        <div class="mt-4 flex">
                                            <div class="flex">
                                                <svg class="h-5 w-5 fill-current
                                                            dark:text-gray-300" viewBox="0 0 24 24">
                                                    <path d="M12 4a4 4 0 014 4 4 4 0 01-4 4
                                                                4 4 0 01-4-4 4 4 0 014-4m0
                                                                10c4.42 0 8 1.79 8
                                                                4v2H4v-2c0-2.21 3.58-4 8-4z"></path>
                                                </svg>
                                                <span class="ml-2 text-sm text-gray-600
                                                            dark:text-gray-300 capitalize">
                                                    {{ $poll->coops->name }}
                                                </span>
                                            </div>

                                            <div class="flex ml-6">
                                                <svg class="h-5 w-5 fill-current
                                                            dark:text-gray-300" viewBox="0 0 24 24">
                                                    <path d="M19
                                                                19H5V8h14m-3-7v2H8V1H6v2H5c-1.11
                                                                0-2 .89-2 2v14a2 2 0 002 2h14a2 2
                                                                0 002-2V5a2 2 0 00-2-2h-1V1m-1
                                                                11h-5v5h5v-5z"></path>
                                                </svg>
                                                <span class="ml-2 text-sm text-gray-600
                                                            dark:text-gray-300 capitalize">
                                                    {{ $poll->created_at->toFormattedDateString() }}
                                                </span>
                                            </div>

                                            <div class="flex ml-6">
                                                <svg class="h-5 w-5
                                                    dark:text-gray-300" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                                    </path>
                                                </svg>
                                                <span class="ml-2 text-sm text-gray-600
                                                            dark:text-gray-300 capitalize">
                                                    {{ $votes->where('poll_id', $poll->id)->count() }}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="mt-4 flex">
                                            <form method="POST" action="{{ route('polls.update', ['id' => $poll->id]) }}" enctype="multipart/form-data" novalidate>
                                                @csrf
                                                @method('PUT')
                                            <button type="submit" class="flex items-center
                                                        focus:outline-none border rounded-full
                                                        py-2 px-6 leading-none border-gray-500
                                                        dark:border-gray-600 select-none
                                                        hover:bg-gray-400 hover:text-white
                                                        dark-hover:text-gray-200">
                                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg>
                                                <span>Cambiar Active/Disable</span>
                                            </button>
                                        </form>
                                            <form action="{{ route('polls.destroy', ['id' => $poll->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="flex items-center ml-4
                                                            focus:outline-none border rounded-full
                                                            py-2 px-6 leading-none border-red-500
                                                            dark:border-blue-600 select-none
                                                            hover:bg-red-400 hover:text-white
                                                            dark-hover:text-gray-200">
                                                    <svg class="h-5 w-5 mr-2 text-red-500" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                    <span>Eliminar</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-col -mt-10 mr-20">
                                    <span class="font-semibold @if($poll->status == 'active')text-green-500 @else text-gray-500 @endif
                                                dark:text-green-300">
                                        {{ $poll->status }}
                                    </span>
                                </div>
                            </div>
                            <a class="text-center flex flex-col items-center
                                    justify-center bg-white dark:bg-gray-800
                                    dark:text-gray-300 ml-1 px-12 cursor-pointer
                                    hover:bg-blue-200 dark-hover:bg-blue-500 rounded-lg"
                                href="{{ route('polls.show', ['id' => $poll->id]) }}">
                                <div>
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
        </main>
    </div>
@endsection
