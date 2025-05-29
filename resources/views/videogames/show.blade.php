@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow-md overflow-hidden max-w-md mx-auto mt-8">
        {{-- Imagen reducida y centrada --}}
        <img
            src="{{ asset($videogame->cover_image) }}"
            alt="{{ $videogame->title }}"
            class="w-48 h-48 object-cover mx-auto mt-4 rounded"
        >

        <div class="p-4 text-center">
            <h1 class="text-2xl font-bold mb-2">{{ $videogame->title }}</h1>

            <div class="space-y-2">
                <p><strong>Developer:</strong> {{ $videogame->developer }}</p>
                <p><strong>Release Year:</strong> {{ $videogame->release_year }}</p>
                <p><strong>Mode:</strong> {{ $videogame->mode }}</p>
                <p><strong>Platform:</strong> {{ $videogame->platform }}</p>

                <div>
                <strong class="block mb-1 text-lg">Genres:</strong>
                    <div class="flex flex-wrap justify-start gap-2">
                        @foreach($videogame->genres as $genre)
                            <span class="bg-blue-100 text-blue-800 px-3 py-1.5 rounded-full text-sm font-medium">
                                {{ $genre->name }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>

            <a href="{{ route('home') }}" class="mt-6 inline-block text-blue-600 hover:text-blue-800 hover:underline">
                ← Back to Home
            </a>
        </div>
    </div>
@endsection
