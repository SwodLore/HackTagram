<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('styles')
        <title>HackTagram - @yield('title')</title>
        <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])            
        @endif
        @livewireStyles
    </head>
    <body class="bg-gray-100">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">
                    <a href="{{ route('home') }}">HackTagram</a>
                </h1>
                @auth
                    <nav class="flex gap-2 items-center">
                        <a href="{{ route('posts.create') }}" class="flex items-center gap-3 bg-white text-gray-600 text-sm p-2 rounded uppercase border font-bold cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                              </svg>
                              
                            Crear
                        </a>
                        <a 
                            href="{{ route('posts.index', auth()->guard('web')->user()->username) }}"
                            class="font-bold text-gray-600 text-sm mr-4">Hola: <span class="font-normal">{{ auth()->guard('web')->user()->username }}</span></a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" href="{{ route('logout') }}" class="font-bold  text-gray-600 text-sm">Cerrar Sesion</button>
                        </form>
                    </nav>
                @endauth
                @guest
                    <nav class="flex gap-2 items-center">
                        <a href="{{ route('login') }}" class="font-bold uppercase text-gray-600 text-sm">Login</a>
                        <a href="{{ route('register.index') }}" class="font-bold uppercase text-gray-600 text-sm">Crear Cuenta</a>
                    </nav>
                @endguest
                
            </div>
        </header>
        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('title')
            </h2>
            @yield('content')
        </main>

        <footer class="mt-10 text-center p-5 text-gray-500">
            <p>DevStagram - Todos los derechos reservados &copy; {{ date('Y') }} Creado por : <a href="https://www.linkedin.com/in/alessandro-piero-poves-martinez-524467318/" referrerPolicy="no-referrer" target="_blank" class="font-bold underline" >Alessandro Poves</a></p>
        </footer>
        @livewireScripts
    </body>
</html>
