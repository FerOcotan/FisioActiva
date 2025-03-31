<?php

namespace App\Http\Controllers;

use App\Models\economico;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EconomicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = economico::all();
        return view('economico.index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('economico.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'yearr'=>'required|integer',
            'mes'=>'required|integer|min:1|max:12',
            'numcitas'=>'required|integer',
            'ingresos'=>'required|numeric',
        ]);

        economico::create($request->all());
        return redirect()->route('economico.index')->with('success', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(economico $economico)
    {
        return view('economico.show', compact('economico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(economico $economico)
    {
        return view('economico.edit', compact('economico'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, economico $economico)
    {
        $request->validate([
            'yearr'=>'required|integer',
            'mes'=>'required|integer|min:1|max:12',
            'numcitas'=>'required|integer',
            'ingresos'=>'required|numeric',
        ]);

        $economico->update($request->all());
        return redirect()->route('economico.index')->with('success', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(economico $economico)
    {
        $economico->delete();
        return redirect()->route('economico.index')->with('success', 'Registro eliminado exitosamente');
    }
}
