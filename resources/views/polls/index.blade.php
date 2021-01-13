@extends('layouts.app')

@section('nav')
    @include('ui.adminnav')
@endsection

@section('content')
    <section class="flex flex-row flex-wrap mx-auto px-4">
        <!-- Polls Info -->
        @forelse($polls as $poll)
            <div class="transition-all duration-150 flex w-full px-4 py-6 md:w-1/2 lg:w-1/3">
                <div
                    class="flex flex-col items-stretch min-h-full pb-4 mb-6 transition-all duration-150 bg-white rounded-lg shadow-lg hover:shadow-2xl">
                    <!-- Poll Image -->
                    <div class="md:flex-shrink-0">
                        {{-- Change in prod --}}
                        {{-- src= {{ Storage::url("{$poll->image}") }}
                        --}}
                        <img src="{{ $poll->image }}" alt="Blog Cover"
                            class="object-fill w-full rounded-lg rounded-b-none md:h-56" />
                    </div>
                    <!-- End Poll Image -->

                    <!-- Poll Total Votes -->
                    <div class="flex items-center justify-between px-4 py-2 overflow-hidden">
                        <span class="text-xs font-medium text-blue-600 uppercase">
                            Votacion
                        </span>
                        <div class="flex flex-row items-center">
                            <div class="text-xs font-medium text-gray-500 flex flex-row items-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                    </path>
                                </svg>
                                <span>{{ $votes->where('poll_id', $poll->id)->count() }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Poll Total Votes -->

                    <!-- Poll Title -->
                    <hr class="border-gray-300" />
                    <div class="flex flex-wrap items-center flex-1 px-4 py-1 text-center mx-auto">
                        <a href="{{ route('polls.show', ['id' => $poll->id]) }}" class="hover:underline">
                            <h2 class="text-2xl font-bold tracking-normal text-gray-800">
                                {{ $poll->title }}
                            </h2>
                        </a>
                    </div>
                    <!-- End Poll Title -->

                    <!-- Poll Description -->
                    <hr class="border-gray-300" />
                    <p class="flex flex-row flex-wrap w-full px-4 py-2 overflow-hidden text-sm text-justify text-gray-700">
                        {{ Str::words(strip_tags($poll->description), 30) }}
                    </p>
                    <!-- Poll Description -->

                    <!-- Poll Author, Date and Status -->
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
                                    <span class="text-xs text-gray-600">{{ $poll->created_at->toFormattedDateString() }}</span>
                                </div>
                            </div>
                            <p class="mt-1 text-xs text-gray-600">{{ ucfirst($poll->status) }}</p>
                        </div>
                    </section>
                    <!-- End Poll Author, Date and Status -->
                </div>
            </div>
            <!-- End Poll Info -->
        @empty
            <!-- Alert Info -->
            <div class="bg-blue-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto w-3/4 xl:w-2/4">
                <svg viewBox="0 0 24 24" class="text-blue-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
                    <path fill="currentColor"
                        d="M12,0A12,12,0,1,0,24,12,12.013,12.013,0,0,0,12,0Zm.25,5a1.5,1.5,0,1,1-1.5,1.5A1.5,1.5,0,0,1,12.25,5ZM14.5,18.5h-4a1,1,0,0,1,0-2h.75a.25.25,0,0,0,.25-.25v-4.5a.25.25,0,0,0-.25-.25H10.5a1,1,0,0,1,0-2h1a2,2,0,0,1,2,2v4.75a.25.25,0,0,0,.25.25h.75a1,1,0,1,1,0,2Z">
                    </path>
                </svg>
                <span class="text-blue-800">Parece que no tienes votaciones disponibles. @if (auth()->user()->role == 'admin') Puedes crear una <a class="underline"
                            href="{{ route('polls.create') }}">aqui.</a>@endif</span>
            </div>
            <!-- End Alert Info -->
        @endforelse
        {{ $polls->links() }}
    @endsection
</section>
