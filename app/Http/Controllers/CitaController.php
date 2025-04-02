<?php

namespace App\Http\Controllers;

use App\Models\cita;
use App\Models\Estado;
use App\Models\usuarios;
use App\Models\Modalidad;
use App\Models\expediente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citas = cita::all();
        return view('cita.index', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $expedientes = expediente::all(); // Obtener expedientes
        $citas = Cita::with('usuario')->get();
        $estados = Estado::all(); // Obtener los estados
        $modalidades = Modalidad::all(); // Obtener las modalidades
        return view('cita.create', compact('expedientes', 'estados', 'modalidades','citas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'numeroexpediente' => 'required|exists:expedientes,numeroexpediente',
            'fechahora' => 'required|date',
            'id_modalidad' => 'required|exists:modalidad,id',
            'cargo' => 'nullable|numeric',
            'id_estado' => 'required|exists:estado,id',  
        ]);
    
        cita::create($request->all());
    
        return redirect()->route('cita.index')->with('success', 'Cita creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $citas = cita::findOrFail($id);
        $expedientes = expediente::all();
        $usuarios = User::all();
        $estados = Estado::all(); // Obtener los estados
        $modalidades = Modalidad::all(); // Obtener las modalidades
        return view('cita.show', compact('citas', 'expedientes', 'usuarios', 'estados', 'modalidades'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $citas = cita::findOrFail($id);
        $expedientes = expediente::all();
        $usuarios = User::all();
        $estados = Estado::all(); // Obtener los estados
        $modalidades = Modalidad::all(); // Obtener las modalidades
        return view('cita.edit', compact('citas', 'expedientes', 'usuarios', 'estados', 'modalidades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'numeroexpediente' => 'required|exists:expedientes,numeroexpediente',
            'fechahora' => 'required|date',
            'id_modalidad' => 'required|exists:modalidad,id',
            'cargo' => 'nullable|numeric',
            'id_estado' => 'required|exists:estado,id',  
        ]);
    
        $cita = cita::findOrFail($id);
        $cita->update($request->all());
    
        return redirect()->route('cita.index')->with('success', 'Cita actualizada correctamente.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $citas = cita::findOrFail($id);
        $citas->delete();

        return redirect()->route('cita.index')->with('success', 'Expediente eliminado correctamente.');
    }
}
