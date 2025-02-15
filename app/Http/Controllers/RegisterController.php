<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    use ValidatesRequests;
    public function index() 
    {
        return view('auth.register');
    }
    public function store(Request $request){

        //Modificar el request 
        $request->request->add(['username' => Str::slug($request->username)]);
        //Validate the inputs
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'username' => 'required|string|min:3|max:30|unique:users',
            'email' => 'required|string|email|max:60|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('web')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        //Redireccionar 
        return redirect()->route('posts.index');
    }
}
