<?php

namespace App\Http\Controllers;

use App\Models\cita;
use App\Models\expediente;
use App\Models\usuarios;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

        $expedientes = expediente::all(); // Obtener expedientes para seleccionar
        return view('cita.create', compact('expedientes'));    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'numeroexpediente' => 'required|exists:expedientes,numeroexpediente',
            'fechahora' => 'required|date',
            'modalidad' => 'required|in:Local,Visita',
            'cargo' => 'nullable|numeric',
            'estado' => 'required|in:Pendiente,Finalizada,Cancelada',
        ]);

        cita::create($request->all());

        return redirect()->route('cita.index')->with('success', 'Cita creada correctamente.');    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $citas = cita::with('usuario')->findOrFail($id);
        return view('cita.show', compact('citas'));
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $citas = cita::findOrFail($id);
        $expedientes = expediente::all();
        $usuarios = usuarios::all();
        return view('cita.edit', compact('citas', 'expedientes', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'numeroexpediente' => 'required|exists:expedientes,numeroexpediente',
            'fechahora' => 'required|date',
            'modalidad' => 'required|in:Local,Visita',
            'cargo' => 'nullable|numeric',
            'estado' => 'required|in:Pendiente,Finalizada,Cancelada',
        ]);  

        $citas = cita::findOrFail($id);
        $citas->update($request->all());

        return redirect()->route('cita.index')->with('success', 'Expediente actualizado correctamente.');
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
