<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $ids = auth()->guard('web')->user()->followings->pluck('id')->toArray();
        $posts = Post::whereIn('user_id', $ids)->with('user')->latest()->paginate(20);
        return view('home', ['posts' => $posts]);
    }
}
