@extends('layouts.app')

@section('nav')
    @include('ui.adminnav')
@endsection

@section('content')
    <section class="flex flex-row flex-wrap mx-auto px-4">
        @forelse($polls as $poll)
            <div class="transition-all duration-150 flex w-full px-4 py-6 md:w-1/2 lg:w-1/3">
                <div
                    class="flex flex-col items-stretch min-h-full pb-4 mb-6 transition-all duration-150 bg-white rounded-lg shadow-lg hover:shadow-2xl">
                    <div class="md:flex-shrink-0">
                        {{-- Change in prod --}}
                        {{-- src= {{ Storage::url("{$poll->image}") }} --}}
                        <img src="{{ $poll->image }}" alt="Blog Cover"
                            class="object-fill w-full rounded-lg rounded-b-none md:h-56" />
                    </div>
                    <div class="flex items-center justify-between px-4 py-2 overflow-hidden">
                        <span class="text-xs font-medium text-blue-600 uppercase">
                            Votacion
                        </span>
                        <div class="flex flex-row items-center">
                            <div class="text-xs font-medium text-gray-500 flex flex-row items-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                                <span>{{ $votes->where('poll_id', $poll->id)->count() }}</span>
                            </div>
                        </div>
                    </div>
                    <hr class="border-gray-300" />
                    <div class="flex flex-wrap items-center flex-1 px-4 py-1 text-center mx-auto">
                        <a href="{{ route('polls.show', ['id' => $poll->id]) }}" class="hover:underline">
                            <h2 class="text-2xl font-bold tracking-normal text-gray-800">
                                {{ $poll->title }}
                            </h2>
                        </a>
                    </div>
                    <hr class="border-gray-300" />
                    <p class="flex flex-row flex-wrap w-full px-4 py-2 overflow-hidden text-sm text-justify text-gray-700">
                        {{ Str::words(strip_tags($poll->description), 30) }}
                    </p>
                    <hr class="border-gray-300" />
                    <section class="px-4 py-2 mt-2">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center flex-1">
                                <img class="object-cover h-10 rounded-full"
                                    src="https://thumbs.dreamstime.com/b/default-avatar-photo-placeholder-profile-icon-eps-file-easy-to-edit-default-avatar-photo-placeholder-profile-icon-124557887.jpg"
                                    alt="Avatar" />
                                <div class="flex flex-col mx-2">
                                    <a href="" class="font-semibold text-gray-700 hover:underline">
                                        {{ auth()->user()->coop->name }}
                                    </a>
                                    <span class="text-xs text-gray-600">{{$poll->created_at->toFormattedDateString()}}</span>
                                </div>
                            </div>
                            <p class="mt-1 text-xs text-gray-600">{{ ucfirst($poll->status) }}</p>
                        </div>
                    </section>
                </div>
            </div>
        @empty
        <div class="flex bg-red-lighter max-w-sm mb-4">
            <div class="w-16 bg-red">
                <div class="p-4">
                    <svg class="h-8 w-8 text-white fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M437.019 74.981C388.667 26.629 324.38 0 256 0S123.333 26.63 74.981 74.981 0 187.62 0 256s26.629 132.667 74.981 181.019C123.332 485.371 187.62 512 256 512s132.667-26.629 181.019-74.981C485.371 388.667 512 324.38 512 256s-26.629-132.668-74.981-181.019zM256 470.636C137.65 470.636 41.364 374.35 41.364 256S137.65 41.364 256 41.364 470.636 137.65 470.636 256 374.35 470.636 256 470.636z" fill="#FFF"/><path d="M341.22 170.781c-8.077-8.077-21.172-8.077-29.249 0L170.78 311.971c-8.077 8.077-8.077 21.172 0 29.249 4.038 4.039 9.332 6.058 14.625 6.058s10.587-2.019 14.625-6.058l141.19-141.191c8.076-8.076 8.076-21.171 0-29.248z" fill="#FFF"/><path d="M341.22 311.971l-141.191-141.19c-8.076-8.077-21.172-8.077-29.248 0-8.077 8.076-8.077 21.171 0 29.248l141.19 141.191a20.616 20.616 0 0 0 14.625 6.058 20.618 20.618 0 0 0 14.625-6.058c8.075-8.077 8.075-21.172-.001-29.249z" fill="#FFF"/></svg>
                </div>
            </div>
            <div class="w-auto text-black opacity-75 items-center p-4">
                <span class="text-lg font-bold pb-4">
                    Lo siento!
                </span>
                <p class="leading-tight">
                    Parece que no tienes votaciones disponibles.@if(auth()->user()->role == 'admin') Puedes crear una <a href="{{ route('polls.create') }}">aqui</a>@endif
                </p>
            </div>
        </div>
        @endforelse
        {{ $polls->links() }}
    @endsection
</section>
