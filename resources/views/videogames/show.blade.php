@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow-md overflow-hidden max-w-2xl mx-auto">
        <img src="{{ asset($videogame->cover_image) }}" alt="{{ $videogame->title }}" 
             class="w-full h-64 object-cover">
        <div class="p-6">
            <h1 class="text-3xl font-bold mb-4">{{ $videogame->title }}</h1>
            <div class="space-y-3">
                <p><strong>Developer:</strong> {{ $videogame->developer }}</p>
                <p><strong>Release Year:</strong> {{ $videogame->release_year }}</p>
                <p><strong>Mode:</strong> {{ $videogame->mode }}</p>
                <p><strong>Platform:</strong> {{ $videogame->platform }}</p>
                <div>
                    <strong>Genres:</strong>
                    <div class="flex gap-2 mt-1">
                        @foreach($videogame->genres as $genre)
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">
                                {{ $genre->name }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
            <a href="{{ route('home') }}" class="mt-6 inline-block text-blue-600 hover:text-blue-800">
                ← Back to Home
            </a>
        </div>
    </div>
@endsection