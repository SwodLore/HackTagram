<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use ValidatesRequests;
    public function index()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required',
        ]);
        if (!auth()->guard('web')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $request->remember)) {
            return back()->with('mensaje','Credenciales incorrectas');
        }
        return redirect()->route('posts.index', ['user' => auth()->guard('web')->user()->username]);
    }
}
