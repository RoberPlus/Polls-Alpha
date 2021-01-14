<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'VotArg') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    @yield('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-200 min-h-screen leading-none">
    <div id="app">
        <nav class="bg-gray-800 shadow-md py-6 px-20">
            <div class="container mx-auto md:px-0">
               <div class="flex items-center justify-around">
                    <a class="text-2xl text-white" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>

                    <nav class="flex-1 text-right items-center">
                        @guest
                            @if (Route::has('login'))
                                <a class="text-white no-underline hover:underline hover:text-gray-300 p-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @endif
                            
                            @if (Route::has('register'))
                                <a class="text-white no-underline hover:underline hover:text-gray-300 p-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                            <span class="text-gray-300 text-sm pr-4">{{ Auth::user()->name }}</span>
                            <a class="no-underline hover:underline text-gray-300 text-sm pr-4" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest
                    </nav>
                </div>
            </div>
        </nav>
        <div class="bg-gray-700">
            <nav class="container mx-auto flex flex-col text-center md:flex-row  space-x-1">
                @yield('nav')
            </nav>
        </div>
        <div class="px-24 pt-12 w-full">
            @yield('messages')
        </div>
        <main class="mt-5 container mx-auto">
            @yield('content')
        </main>
    </div>
    @yield('scripts')
</body>
</html>