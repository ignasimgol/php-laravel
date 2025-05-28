@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-8 py-4">
        @foreach($videogames as $videogame)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset($videogame->cover_image) }}" alt="{{ $videogame->title }}" 
                     class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-bold mb-2">
                        <a href="{{ route('videogames.show', $videogame) }}" 
                           class="text-blue-600 hover:text-blue-800">
                            {{ $videogame->title }}
                        </a>
                    </h2>
                    <p class="text-gray-600 mb-2">Developer: {{ $videogame->developer }}</p>
                    <p class="text-gray-600">Platform: {{ $videogame->platform }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection