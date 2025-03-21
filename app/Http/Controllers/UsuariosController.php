<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = usuarios::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(([
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'edad' => 'nullable|integer|min:1|max:110',
            'genero' => 'nullable|in:Masculino,Femenino',
            'direccion' => 'nullable|string|max:50',
            'latitud' => 'nullable|numeric',
            'longitud' => 'nullable|numeric',
            'telefono' => 'nullable|string|max:12',
            'correo' => 'required|string|email|max:25|unique:usuarios,correo',
            'contrasena' => 'required|string|min:3',
            'rol' => 'nullable|in:Administrador,Cliente',
            'estado' => 'nullable|in:Activo,Desactivado',
        ]));

        usuarios::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'edad' => $request->edad,
            'genero' => $request->genero,
            'direccion' => $request->direccion,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'contrasena' => Hash::make($request->contrasena),
            'rol' => $request->rol ?? 'Cliente',
            'estado' => $request->estado ?? 'Activo',
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(usuarios $usuarios)
    {
        return view('usuarios.show', compact('usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(usuarios $usuarios)
    {
        return view('usuarios.edit', compact('usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, usuarios $usuarios)
    {
        $request->validate(([
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'edad' => 'nullable|integer|min:1|max:110',
            'genero' => 'nullable|in:Masculino,Femenino',
            'direccion' => 'nullable|string|max:50',
            'latitud' => 'nullable|numeric',
            'longitud' => 'nullable|numeric',
            'telefono' => 'nullable|string|max:12',
            'correo' => 'required|string|email|max:255|unique:usuarios,correo,' . $usuarios->idusuario . ',idusuario',
            'contrasena' => 'required|string|min:3',
            'rol' => 'nullable|in:Administrador,Cliente',
            'estado' => 'nullable|in:Activo,Desactivado',
        ]));

        $usuarios->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'edad' => $request->edad,
            'genero' => $request->genero,
            'direccion' => $request->direccion,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'contrasena' => $request->contrasena ? Hash::make($request->contrasena) : $usuarios->contrasena,
            'rol' => $request->rol ?? 'Cliente',
            'estado' => $request->estado ?? 'Activo',
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(usuarios $usuarios)
    {
        $usuarios->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente');
    }
}
