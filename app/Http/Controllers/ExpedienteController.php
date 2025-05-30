<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\usuarios;
use App\Models\expediente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Users;

class ExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expedientes = expediente::paginate(5);
        return view('expediente.index', compact('expedientes'));
    }

    public function dash(Request $request)
    {
        $search = $request->input('search');
    
        $expedientes = Expediente::with('user')->when($search, function ($query, $search) {
            return $query->whereHas('user', function ($userQuery) use ($search) {
                $userQuery->where('name', 'LIKE', "%$search%");
            });
        })->get();
    
        return view('expediente.dash', compact('expedientes'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estados = Estado::whereIn('id', [3, 4])->get();
        $usuarios = User::all();
        return view('expediente.create', compact('estados', 'usuarios'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:users,id',
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
            'id_estado' => 'required|exists:estado,id'
        ]);

        expediente::create([
            'id_usuario' => $request->id_usuario,
            'fechacreacion' => $request->fechacreacion,
            'numcitas' => $request->numcitas,
            'diagnostico' => $request->diagnostico,
            'fechaevaluacion' => $request->fechaevaluacion,
            'historiaclinica' => $request->historiaclinica,
            'observacion' => $request->observacion,
            'palpacion' => $request->palpacion,
            'sensibilidad' => $request->sensibilidad,
            'arcosdemovimiento' => $request->arcosdemovimiento,
            'fuerzamuscular' => $request->fuerzamuscular,
            'perimetria' => $request->perimetria,
            'longitudmiembrosinf' => $request->longitudmiembrosinf,
            'marcha' => $request->marcha,
            'postura' => $request->postura,
            'nombrefisioterapeuta' => $request->nombrefisioterapeuta,
            'notasevolutivas' => $request->notasevolutivas,
            'id_estado' => $request->id_estado,
        ]);

        return redirect()->route('expediente.index')->with('success', 'Expediente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $estados = Estado::all();
        $expedientes = expediente::with('user')->findOrFail($id);
        return view('expediente.show', compact('expedientes', 'estados'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $expedientes = expediente::findOrFail($id); // 
        $estados = Estado::whereIn('id', [3, 4])->get();
        return view('expediente.edit', compact('expedientes', 'estados'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            //'id_usuario' => 'required|exists:usuarios,id',
            'fechacreacion' => 'required|date',
            'numcitas' => 'required|nullable|integer',
            'diagnostico' => 'required|nullable|string',
            'fechaevaluacion' => 'required|nullable|date',
            'historiaclinica' => 'required|nullable|string',
            'observacion' => 'required|nullable|string',
            'palpacion' => 'required|nullable|string',
            'sensibilidad' => 'required|nullable|string',
            'arcosdemovimiento' => 'required|nullable|string',
            'fuerzamuscular' => 'required|nullable|string',
            'perimetria' => 'required|nullable|string',
            'longitudmiembrosinf' => 'required|nullable|string',
            'marcha' => 'required|nullable|string',
            'postura' => 'required|nullable|string',
            'nombrefisioterapeuta' => 'required|string|max:50',
            'notasevolutivas' => 'required|nullable|string',
            'id_estado' => 'required|exists:estado,id'
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
