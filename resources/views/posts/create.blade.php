@extends('layouts.app')

@section('title', 'Crea una nueva Publicación')
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush
@section('content')
    <div class="md:flex md:items-center md:justify-center md:gap-10">
        <div class="md:w-6/12 px-10">
            <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center" id="my-dropzone">
                @csrf
            </form>
        </div>
        <div class="md:w-6/12 px-10 bg-white p-6 rounded-lg shadow-xl md:mt-0">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="mb-5"
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">Titulo</label>
                    <input 
                        type="text"
                        id="titulo"
                        name="titulo"
                        placeholder="Titulo de la publicación"
                        class="border p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror"
                        value="{{ old('titulo') }}"
                        >
                    @error('titulo')
                        <p class="text-red-500 text-xs italic my-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5"
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">Descripción</label>
                    <textarea 
                        id="descripcion"
                        name="descripcion"
                        placeholder="Descripción de la publicación"
                        class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror"
                    >{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <p class="text-red-500 text-xs italic my-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input type="hidden" name="imagen" value="{{ old('imagen') }}">
                    @error('imagen')
                        <p class="text-red-500 text-xs italic my-2">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" value="Crear Publicación" class="bg-sky-600 hover:bg-sky-700 text-white font-bold p-3 w-full rounded-lg transition-colors cursor-pointer">
            </form>
        </div>
    </div>
@endsection