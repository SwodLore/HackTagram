<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    use ValidatesRequests;
    public function index()
    {
        return view('perfil.index');
    }
    public function store(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'username' => ['required', 'string', 'min:3', 'max:30', 'unique:users,username,'.auth()->guard('web')->user()->id,'not_in:editar-perfil'],
            'email' => ['required','string','email','max:60','unique:users,email,'.auth()->guard('web')->user()->id],
        ]);
        if($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid().'.'.$imagen->extension();

            $imagenServidor = Image::read($imagen);
            $imagenServidor->resize(1000, 1000);

            $imagenPath = public_path('perfiles/'.$nombreImagen);
            $imagenServidor->save($imagenPath);
        }
        $usuario = User::find(auth()->guard('web')->user()->id);
        $usuario->name = $request->name;
        $usuario->username = $request->username;
        $usuario->email = $request->email;
        $usuario->imagen = $nombreImagen ?? auth()->guard('web')->user()->imagen ?? null;
        $usuario->save();
        return redirect()->route('posts.index', $usuario->username);
    }
    public function indexPassword()
    {
        return view('perfil.update-password');
    }
    public function update(Request $request)
    {
        // Validación de los campos

        $request->validate([
            'password_current' => ['required'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        // Obtener usuario autenticado
        $usuario = User::find(auth()->guard('web')->user()->id);

        // Verificar que la contraseña actual sea correcta
        if (!Hash::check($request->password_current, $usuario->password)) {
            return back()->withErrors(['password_current' => 'La contraseña actual no es correcta']);
        }

        // Actualizar la contraseña
        $usuario->password = Hash::make($request->password);
        $usuario->save();

        return redirect()->route('perfil.index')->with('success', 'Contraseña actualizada correctamente');
    }
}
