<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{   
    use ValidatesRequests;
    public function store(Request $request, User $user, Post $post)
    {
        $this->validate($request, [
            'comentario' => 'required|string|max:255',
        ]);
        Comentario::create([
            'comentario' => $request->comentario,
            'user_id' => auth()->guard('web')->user()->id,
            'post_id' => $post->id,
        ]);
        return back()->with('mensaje', 'Comentario publicado');
    }
}
