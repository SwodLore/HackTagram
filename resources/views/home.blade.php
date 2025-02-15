@extends('layouts.app')
@section('title')
    Pagina Principal
@endsection
@section('content')
    @forelse ($posts as $post)
    <div class="md:flex flex-col md:justify-center items-center">
        <div class="sm:w-12/12 md:w-10/12 lg:w-8/12 xl:w-6/12 flex items-center justify-between px-2 sm:px-10">
            <div class="flex items-start gap-3 p-3">
                <a href='{{ route('posts.index', ['post' => $post, 'user' => $post->user]) }}'>
                    <img src="{{ $post->user->imagen ? asset('perfiles/'.$post->user->imagen) : asset('img/usuario.svg')}}" alt="Imagen de Perfil por default" class="w-10 h-10 rounded-full object-cover">
                </a>
                <div>
                    <p class="text-sm">
                        <span class="font-bold"><a href='{{ route('posts.index', ['post' => $post, 'user' => $post->user]) }}'>{{ $post->user->username }}</a>:</span> {{ $post->descripcion }}</p>
                    <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}">
                <button class="bg-blue-600 text-white font-bold px-3 py-1 rounded-lg transition-colors cursor-pointer">
                    Ver Publicación
                </button>
            </a>
        </div>
        <div class="w-12/12 md:w-8/12 px-10 border-y lg:w-7/12 xl:w-5/12 2xl:w-4/12">
            <img src="{{ asset('uploads/'.$post->imagen) }}" alt="Imagen de Publicación {{ $post->titulo }}" class="w-full h-full object-cover">
        </div>
        <div class="flex items-center gap-3 justify-center">
            <p class="text-bold">{{ $post->likes->count() }} <span class="font-normal">Likes</span></p>
            <p>{{ $post->comentarios->count() }} Commentarios</p>
            <p>0 Compartidos</p>
        </div>
    </div>
    @empty
        <p class="text-center text-gray-500 text-sm">No hay publicaciones</p>
    @endforelse
@endsection
