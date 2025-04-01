<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Genero;
use App\Models\Rol;
use App\Models\Estado;

class UsuariosController extends Controller
{
    /**
     * Muestra la lista de usuarios.
     */
    public function index()
    {
        $usuarios = usuarios::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Muestra el formulario para crear un nuevo usuario.
     */
    public function create()
    {
        $generos = Genero::all();  // Corrección: usar $generos en lugar de $genero
    $roles = Rol::all();
    $estados = Estado::all();
    
    return view('usuarios.create', compact('generos', 'roles', 'estados'));

        return view('usuarios.create');
    }

    /**
     * Almacena un nuevo usuario en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'edad' => 'nullable|integer|min:1|max:110',
            'genero' => 'nullable|exists:genero,id',
            'direccion' => 'nullable|string|max:50',
            'latitud' => 'nullable|numeric',
            'longitud' => 'nullable|numeric',
            'telefono' => 'nullable|string|max:12',
            'correo' => 'required|string|email|max:25|unique:usuarios,correo',
            'contrasena' => 'required|string|min:3',
         'rol' => 'nullable|exists:rol,id',
            'estado' => 'nullable|exists:estado,id',
            
        ]);

        usuarios::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'edad' => $request->edad,
            'id_genero' => $request->genero, 
            'direccion' => $request->direccion,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'contrasena' => Hash::make($request->contrasena),
            'id_rol' => $request->rol,
            'id_estado' => $request->estado,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente');
    }

    /**
     * Muestra un usuario específico.
     */
    public function show(usuarios $usuarios)
    {
        return view('usuarios.show', compact('usuarios'));
    }

    /**
     * Muestra el formulario de edición de un usuario.
     */
    public function edit(usuarios $usuarios)
    {
        $generos = Genero::all();  // Corrección: usar $generos
        $roles = Rol::all();
        $estados = Estado::all();
        
        return view('usuarios.edit', compact('usuarios', 'generos', 'roles', 'estados'));
    }
    /**
     * Actualiza un usuario en la base de datos.
     */
    public function update(Request $request, usuarios $usuarios)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'edad' => 'nullable|integer|min:1|max:110',
            'genero' => 'nullable|exists:genero,id',
            'direccion' => 'nullable|string|max:50',
            'latitud' => 'nullable|numeric',
            'longitud' => 'nullable|numeric',
            'telefono' => 'nullable|string|max:12',
          'correo' => 'required|string|email|max:255|unique:usuarios,correo,' . $usuarios->idusuario . ',idusuario',

            'contrasena' => 'nullable|string|min:3', // Ahora es opcional
             'rol' => 'nullable|exists:rol,id',
         'estado' => 'nullable|exists:estado,id',
        ]);

        $usuarios->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'edad' => $request->edad,
            'id_genero' => $request->genero, // Almacenando el ID
            'direccion' => $request->direccion,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'contrasena' => $request->filled('contrasena') ? Hash::make($request->contrasena) : $usuarios->contrasena,
            'id_rol' => $request->rol, // Almacenando el ID
            'id_estado' => $request->estado, // Almacenando el ID
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente');
    }

    /**
     * Elimina un usuario de la base de datos.
     */
    public function destroy(usuarios $usuarios)
    {
        $usuarios->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente');
    }
}
