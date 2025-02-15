@extends('layouts.app')

@section('title')
    Registro
@endsection

@section('content')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/registrar.jpg')}}" alt="Imagen de Login">
        </div>
        <div class="md:w-6/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('register.store') }}" method="POST">
                @csrf
                <div class="mb-5"
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                    <input 
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Ingresa tu Nombre"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}"
                        >
                    @error('name')
                        <p class="text-red-500 text-xs italic my-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5"
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">User Name</label>
                    <input 
                        type="text"
                        id="username"
                        name="username"
                        placeholder="Ingresa tu nombre de Usuario"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ old('username') }}"
                    >
                    @error('username')
                        <p class="text-red-500 text-xs italic my-2">{{ $message }}</p>
                    @enderror
                </div>
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
                <div class="mb-5"
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repite la Contraseña</label>
                    <input 
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Repite tu contraseña"
                        class="border p-3 w-full rounded-lg"
                    >
                </div>
                <input type="submit" value="Crear Cuenta" class="bg-sky-600 hover:bg-sky-700 text-white font-bold p-3 w-full rounded-lg transition-colors cursor-pointer">
            </form>
        </div>
    </div>
@endsection