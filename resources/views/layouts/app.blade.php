<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Videogames Catalog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-lg mb-6">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex space-x-4 gap-4">
                    <a href="{{ route('home') }}" class="text-black-700 hover:text-blue-300 hover:underline">Home</a>
                    <a href="/api/videogames" class="text-black-700 hover:text-blue-300 hover:underline" target="_blank">API_videogames</a>
                    <a href="/api/videogame/1" class="text-black-700 hover:text-blue-300 hover:underline" target="_blank">API_videogame</a>
                    <a href="/api/genre/1" class="text-black-700 hover:text-blue-300 hover:underline" target="_blank">API_genre</a>
                </div>

                <div class="flex items-center space-x-4">
                    @if (Route::has('login'))
                        <div class="flex items-center space-x-4">
                            @auth
                                <a href="{{ route('profile.edit') }}" 
                                   class="inline-block px-5 py-1.5 text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                                    Profile
                                </a>
                                <a href="{{ url('/dashboard') }}" 
                                   class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                    Dashboard
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" 
                                            class="inline-block px-5 py-1.5 text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                                        Log Out
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" 
                                   class="inline-block px-5 py-1.5 text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                                    Log in
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" 
                                       class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-6">
        @yield('content')
    </main>
</body>
</html>
