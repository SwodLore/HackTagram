<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store(Request $request)
    {
        auth()->guard('web')->logout();
        return redirect()->route('login');
    }
}
