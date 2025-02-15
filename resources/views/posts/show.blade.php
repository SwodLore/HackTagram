@extends('layouts.app')
@section('title')
    {{ $post->titulo }}
@endsection
@section('content')
    <div class="md:flex md:justify-center md:gap-10">
        <div class="md:w-6/12 px-10">
            <img src="{{ asset('uploads/'.$post->imagen) }}" alt="Imagen de Publicación {{ $post->titulo }}">
        </div>
        <div class="md:w-8/12 lg:w-6/12 px-10">
            <div class="shadow bg-white p-5">
                <div class="p-3 flex justify-between items-center">
                    <div class="flex items-center gap-3 ">
                    @auth
                        <livewire:like-post :post="$post" />
                    @endauth
                    </div>
                    @auth
                        @if ($post->user_id === auth()->guard('web')->user()->id)
                        <form action="{{ route('posts.destroy', ['post' => $post]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input 
                            type="submit"
                            value="Eliminar"
                            class="text-red-400 font-semibold hover:text-red-500 transition p-2 mt-4 cursor-pointer"
                            />
                        </form>
                        @endif
                    @endauth
                </div>

                <div class="flex items-start gap-3 p-3 border-b">
                    <a href='{{ route('posts.index', ['post' => $post, 'user' => $user]) }}'><img src="{{ $user->imagen ? asset('perfiles/'.$user->imagen) : asset('img/usuario.svg')}}" alt="Imagen de Perfil por default" class="w-10 h-10 rounded-full object-cover"></a>
                    <div>
                        <p class="text-sm"> 
                            <a href='{{ route('posts.index', ['post' => $post, 'user' => $user]) }}'>
                            <span class="font-bold">{{ $post->user->username }}:</span> </a> {{ $post->descripcion }}</p>
                        <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                @auth
                <form class="flex items-center gap-3 p-3 border-t" action="{{ route('comentarios.store', ['post' => $post, 'user' => $user ]) }}" method="POST">
                    @csrf
                    <a href='{{ route('posts.index', ['post' => $post, 'user' => auth()->guard('web')->user()]) }}'><img src="{{ auth()->guard('web')->user()->imagen ? asset('perfiles/'.auth()->guard('web')->user()->imagen) : asset('img/usuario.svg')}}" alt="Imagen de Perfil por default" class="w-10 h-10 rounded-full object-cover"></a>
                    <div class="mb-5"
                        <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">Añade un comentario</label>
                        @if (session('mensaje'))
                            <p class="text-green-500 text-xs italic my-2">{{ session('mensaje') }}</p>
                        @endif
                        <textarea 
                            id="comentario"
                            name="comentario"
                            placeholder="Agrega un comentario"
                            class="w-full p-2 border rounded-lg h-10 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none leading-tight placeholder:text-gray-400 @error('comentario') border-red-500 @enderror"
                        ></textarea>
                        @error('comentario')
                            <p class="text-red-500 text-xs italic my-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="text-blue-500 font-semibold hover:text-blue-700 transition">
                        Publicar
                    </button>
                </form>        
                @endauth
                <div>
                    <h2 class="text-2xl text-center border-t">Comentarios</h2>
                    @if ($post->comentarios->isEmpty())
                        <p class="text-center text-gray-500 text-sm mb-10">No hay comentarios</p>
                    @else
                        @foreach($post->comentarios as $comentario)
                            <div class="flex items-start gap-3 p-3 border-b">
                                <a href='{{ route('posts.index', ['post' => $post, 'user' => $comentario->user]) }}'><img src="{{ $comentario->user->imagen ? asset('perfiles/'.$comentario->user->imagen) : asset('img/usuario.svg')}}" alt="Imagen de Perfil por default" class="w-10 h-10 rounded-full object-cover"></a>
                                <div>
                                    <p class="text-sm">
                                        <a href='{{ route('posts.index', ['post' => $post, 'user' => $comentario->user]) }}' class="font-bold">{{ $comentario->user->username }}</a>: {{ $comentario->comentario }}</p>
                                    <p class="text-xs text-gray-500">{{ $comentario->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection