<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Genero;
use App\Models\Rol;
use App\Models\Estado;

class UsuariosController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $usuarios = User::when($search, function ($query, $search) {
            return $query->where('name', 'LIKE', "%$search%");
        })->get();
    
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        $generos = Genero::all();
        $roles = Rol::all();
        $estados = Estado::all();
    
        return view('usuarios.create', compact('generos', 'roles', 'estados'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:50',
        'apellido' => 'required|string|max:50',
        'edad' => 'nullable|integer|min:1|max:110',
        'direccion' => 'nullable|string|max:255',
        'latitud' => 'nullable|numeric',
        'longitud' => 'nullable|numeric',
        'telefono' => 'nullable|string|max:12',
        'email' => 'required|string|email|max:255|unique:users,email',
        'password' => 'required|string|min:3',
        'id_genero' => 'nullable|exists:genero,id',
        'id_rol' => 'nullable|exists:rol,id',
        'id_estado' => 'nullable|exists:estado,id',
    ]);

    User::create([
        'name' => $request->name,
        'apellido' => $request->apellido,
        'edad' => $request->edad,
        'direccion' => $request->direccion,
        'latitud' => $request->latitud,
        'longitud' => $request->longitud,
        'telefono' => $request->telefono,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'id_genero' => $request->id_genero,
        'id_rol' => $request->id_rol,
        'id_estado' => $request->id_estado,
    ]);

    return redirect()->route('usuarios.index')
    ->with('success', 'Usuario creado correctamente');


}



    public function show($id)
    {
        $usuarios = User::findOrFail($id);
        return view('usuarios.show', compact('usuarios'));
 

    }


    public function edit($id)
    {
        $usuario = User::findOrFail($id); // O el modelo que estés usando
        $generos = Genero::all(); // Asegúrate de tener estos modelos importados
        $roles = Rol::all();
        $estados = Estado::all();
        
        return view('usuarios.edit', compact('usuario', 'generos', 'roles', 'estados'));
    }
    public function update(Request $request,  $id)
    {
        $usuario = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'edad' => 'nullable|integer|min:1|max:110',
            'direccion' => 'nullable|string|max:255',
            'latitud' => 'nullable|numeric',
            'longitud' => 'nullable|numeric',
            'telefono' => 'nullable|string|max:12',
            'email' => 'required|string|email|max:255|unique:users,email,' . $usuario->id,
            'password' => 'nullable|string|min:3',
            'id_genero' => 'nullable|exists:genero,id',
            'id_rol' => 'nullable|exists:rol,id',
            'id_estado' => 'nullable|exists:estado,id',
        ]);
    
        $usuario->update([
            'name' => $request->name,
            'apellido' => $request->apellido,
            'edad' => $request->edad,
            'direccion' => $request->direccion,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'password' => $request->filled('password') ? Hash::make($request->password) : $usuario->password,
            'id_genero' => $request->id_genero,
            'id_rol' => $request->id_rol,
            'id_estado' => $request->id_estado,
        ]);
    
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente');
    }
    

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // Eliminar el usuario
        $user->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente');
    }
}
