@extends('layouts.app')
@section('title')
    Editar Perfil: {{ auth()->guard('web')->user()->username }}
@endsection
@section('content')
    <div class="md:flex md:justify-center gap-5">
        <div class="md:w-6/12 bg-white shadow p-6">
            <p><a href="{{ route('perfil.password.index') }}" class="text-sky-600 hover:text-sky-700 transition cursor-pointer">Cambiar Contraseña</a></p>
            @if (session('success'))
                <p class="text-green-500 text-sm italic my-2">
                    {{ session('success') }}
                </p>
            @endif
            <form action="{{ route('perfil.store') }}" method="POST" class="mt-4 md:t-0" enctype="multipart/form-data">
                @csrf
                <div class="mb-5"
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                    <input 
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Ingresa tu nombre de Nombre"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ auth()->guard('web')->user()->name }}"
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
                        value="{{ auth()->guard('web')->user()->username }}"
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
                        value="{{ auth()->guard('web')->user()->email }}"
                    >
                    @error('email')
                        <p class="text-red-500 text-xs italic my-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5"
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">Imagen de Perfil</label>
                    <input 
                        type="file"
                        id="imagen"
                        name="imagen"
                        class="border p-3 w-full rounded-lg"
                        accept=".png, .jpg, .jpeg"
                        >
                </div>
                <input type="submit" value="Actualizar Datos" class="bg-sky-600 hover:bg-sky-700 text-white font-bold p-3 w-full rounded-lg transition-colors cursor-pointer">
            </form>
        </div>
    </div>
@endsection