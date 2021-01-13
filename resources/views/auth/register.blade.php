@extends('layouts.app')

@section('content')
<!-- Register Form Container -->
<div class="container mx-auto max-w-screen-md">
    <div class="flex flex-wrap justify-center">
        <div class="md:w-1/2 prder:2 md:order-1">
            <div class="w-full max-w-sm">
                <div class="flex flex-col break-words bg-white border border-2 shadow-md my-10">
                    <div class="bg-gray-300 text-gray-700 uppercase text-center py-3 px-6 mb-0">
                        {{ __('Register')}}
                    </div> 

                    <!-- Register Form  -->
                    <form class="py-10 px-5" method="POST" action="{{ route('register') }}" novalidate>
                        @csrf

                        <!-- Username Input Form  -->
                        <div class="flex flex-wrap mb-6">
                            <label for="name" class="block text-gray-700 text-sm mb-2">{{ __('Name') }}</label>
                            <input id="name" type="text" class="p-3 bg-gray-100 roundend form-input w-full @error('name') border-red-500 border @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                            @error('name')
                                <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- End Username Input Form  -->

                        <!-- Email Input Form  -->
                        <div class="flex flex-wrap mb-6">
                            <label for="email" class="block text-gray-700 text-sm mb-2">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="p-3 bg-gray-100 roundend form-input w-full @error('email') border-red-500 border @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                            @error('email')
                                <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- End Email Input Form  -->

                        <!-- Cooperative Select Form  -->
                        <div class="flex flex-wrap mb-6">
                            <label for="coop_id" class="block text-gray-700 text-sm mb-2">Cooperativa:</label>
                            <select name="coop_id" id="coop_id"
                            class="p-3 bg-gray-100 roundend form-input w-full @error('coop_id') border-red-500 border @enderror">
                                <option value='' selected>Elige...</option>
                                @foreach ($coops as $coop)
                                    <option class="px-3 py-2 cursor-pointer hover:bg-gray-200" value="{{ $coop->id }}">
                                        {{ $coop->name }}
                                    </option>
                                @endforeach
                            </select>
        
                            @error('coop_id')
                                <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- End Cooperative Select Form  -->

                        <!-- Password Input Form  -->
                        <div class="flex flex-wrap mb-6">
                            <label for="password" class="block text-gray-700 text-sm mb-2">{{ __('Password') }}</label>                 
                            <input id="password" type="password" class="p-3 bg-gray-100 roundend form-input w-full @error('password') border-red-500 border @enderror" name="password" autocomplete="new-password">

                            @error('password')
                                <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- End Password Input Form  -->

                        <!-- Confirm Password Input Form  -->
                        <div class="flex flex-wrap mb-6">
                            <label for="password-confirm" class="block text-gray-700 text-sm mb-2">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="p-3 bg-gray-200 rounded form-input w-full" name="password_confirmation"  autocomplete="password-confirm">

                            @error('password-confirm')
                                <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- End Confirm Password Input Form  -->
                        
                        <!-- Submit Form  -->
                        <div class="flex flex-wrap">
                            <button type="submit" class="bg-green-500 w-full hover:bg-green-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase">
                                {{ __('Register') }}
                            </button>
                        </div>
                        <!-- End Submit Form  -->
                    </form> 
                    <!-- Register Form  -->
                </div>
            </div>
        </div>
        <!-- Register Form Container -->

        <!-- Aside  -->
        <div class="md:w-1/2 order:1 md:order-2 text-center flex flex-col justify-center px-10 mt-1-">
            <h1 class="text-green-500 text-3xl">¿Necesitas un sistema de votos seguro?</h1>
            <p class="text-lg mt-5 leading-7">Crea una cuenta totalmente gratis y comienza a votar en votaciones creadas por tu equipo o puedes crear votaciones.</p>
        </div>
        <!-- End Aside  -->
    </div>
</div>

@endsection
