@extends('layouts.app')

@section('title')
    Inicio de Sesion
@endsection

@section('content')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/login.jpg')}}" alt="Imagen de Login">
        </div>
        <div class="md:w-6/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('login.store') }}" method="POST">
                @csrf
                @if (session('mensaje'))
                    <p class="text-red-500 text-xs italic my-2">{{ session('mensaje') }}</p>
                @endif
                <div class="mb-5"
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input 
                        type="text"
                        id="email"
                        name="email"
                        placeholder="Ingresa tu email"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}"
                    >
                    @error('email')
                        <p class="text-red-500 text-xs italic my-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5"
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Contraseña</label>
                    <input 
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Ingresa tu contraseña"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"
                    >
                    @error('password')
                        <p class="text-red-500 text-xs italic my-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input type="checkbox" name="remember" id="remember"><label for="remember" class=" text-gray-500 text-sm">Mantener Sesion Iniciada</label> 
                </div>
                <input type="submit" value="Iniciar Sesion" class="bg-sky-600 hover:bg-sky-700 text-white font-bold p-3 w-full rounded-lg transition-colors cursor-pointer">
            </form>
        </div>
    </div>
@endsection