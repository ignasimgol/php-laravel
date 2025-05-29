@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2 px-4 py-4 justify-items-center">
        @foreach($videogames as $videogame)
            {{-- Tarjeta-entero clicable con movimiento y cambio de color en hover --}}
            <a href="{{ route('videogames.show', $videogame) }}"
               class="group bg-white rounded-lg shadow-md overflow-hidden w-48 transform transition-transform duration-200 hover:-translate-y-1">
                
                {{-- Imagen que ocupa el ancho completo y mantiene proporción --}}
                <img src="{{ asset($videogame->cover_image) }}"
                     alt="{{ $videogame->title }}"
                     class="w-full h-32 object-cover">

                <div class="p-2">
                    {{-- Título: cambia a blanco en hover porque todos los textos deben volverse blancos en fondo azul --}}
                    <h2 class="text-sm font-semibold mb-1 leading-tight text-blue-600 group-hover:text-white">
                        {{ Str::limit($videogame->title, 20) }}
                    </h2>
                    {{-- Para los párrafos, aplicamos text-gray-600 que cambie a text-white en hover --}}
                    <p class="text-xs text-gray-600 leading-snug group-hover:text-white">
                        Dev: {{ Str::limit($videogame->developer, 15) }}
                    </p>
                    <p class="text-xs text-gray-600 leading-snug group-hover:text-white">
                        Platform: {{ Str::limit($videogame->platform, 15) }}
                    </p>
                </div>
            </a>
        @endforeach
    </div>
@endsection
