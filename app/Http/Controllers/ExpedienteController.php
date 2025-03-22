<?php

namespace App\Http\Controllers;

use App\Models\expediente;
use App\Models\usuarios;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expedientes = expediente::all();
        return view('expediente.index', compact('expedientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = usuarios::all();
        return view('expediente.create', compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'idusuario' => 'required|exists:usuarios,idusuario',
            'fechacreacion' => 'required|date',
            'numcitas' => 'nullable|integer',
            'diagnostico' => 'nullable|string',
            'fechaevaluacion' => 'nullable|date',
            'historiaclinica' => 'nullable|string',
            'observacion' => 'nullable|string',
            'palpacion' => 'nullable|string',
            'sensibilidad' => 'nullable|string',
            'arcosdemovimiento' => 'nullable|string',
            'fuerzamuscular' => 'nullable|string',
            'perimetria' => 'nullable|string',
            'longitudmiembrosinf' => 'nullable|string',
            'marcha' => 'nullable|string',
            'postura' => 'nullable|string',
            'nombrefisioterapeuta' => 'required|string|max:50',
            'notasevolutivas' => 'nullable|string',
            'estado' => 'required|in:Abierto,Cerrado',
        ]);

        expediente::create($request->all());

        return redirect()->route('expediente.index')->with('success', 'Expediente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $expedientes = expediente::with('usuario')->findOrFail($id);
        return view('expediente.show', compact('expedientes'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $expedientes = expediente::findOrFail($id);
        $usuarios = usuarios::all();
        return view('expediente.edit', compact('expedientes', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            //'idusuario' => 'required|exists:usuarios,idusuario',
            'fechacreacion' => 'required|date',
            'numcitas' => 'nullable|integer',
            'diagnostico' => 'nullable|string',
            'fechaevaluacion' => 'nullable|date',
            'historiaclinica' => 'nullable|string',
            'observacion' => 'nullable|string',
            'palpacion' => 'nullable|string',
            'sensibilidad' => 'nullable|string',
            'arcosdemovimiento' => 'nullable|string',
            'fuerzamuscular' => 'nullable|string',
            'perimetria' => 'nullable|string',
            'longitudmiembrosinf' => 'nullable|string',
            'marcha' => 'nullable|string',
            'postura' => 'nullable|string',
            'nombrefisioterapeuta' => 'required|string|max:50',
            'notasevolutivas' => 'nullable|string',
            'estado' => 'required|in:Abierto,Cerrado',
        ]);

        $expedientes = expediente::findOrFail($id);
        $expedientes->update($request->all());

        return redirect()->route('expediente.index')->with('success', 'Expediente actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $expedientes = expediente::findOrFail($id);
        $expedientes->delete();

        return redirect()->route('expediente.index')->with('success', 'Expediente eliminado correctamente.');
    }
}
