@extends('layouts.app')
@section('title')
    Cambiar Contraseña: {{ auth()->guard('web')->user()->username }}
@endsection
@section('content')
    <div class="md:flex md:justify-center gap-5">
        <div class="md:w-6/12 bg-white shadow p-6">
        <form action="{{ route('perfil.password.update') }}" method="POST" class="mt-10 md:t-0">
            @csrf
            <div class="mb-5"
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Contraseña Actual</label>
                <input 
                    type="password"
                    id="password_current"
                    name="password_current"
                    placeholder="Ingresa tu contraseña"
                    class="border p-3 w-full rounded-lg @error('password_current') border-red-500 @enderror"
                >
                @error('password_current')
                    <p class="text-red-500 text-xs italic my-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5"
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Nueva Contraseña</label>
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
            <input type="submit" value="Actualizar Datos" class="bg-cyan-600 hover:bg-cyan-700 text-white font-bold p-3 w-full rounded-lg transition-colors cursor-pointer">
        </form>
        </div>
    </div>
@endsection