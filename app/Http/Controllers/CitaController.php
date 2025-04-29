<?php

namespace App\Http\Controllers;

use App\Models\cita;
use App\Models\Estado;
use App\Models\usuario;
use App\Models\Modalidad;
use App\Models\expediente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$citas = cita::all();
        //return view('cita.index', compact('citas'));

        $search = $request->input('search');

        $citas = Cita::when($search, function ($query, $search) {
            return $query->whereHas('expediente', function ($q) use ($search) {
                $q->where('numeroexpediente', 'LIKE', "%$search%");
            });
        })->get();

        return view('cita.index', compact('citas'));

    }

    public function dashboard()
    {   
        //$hoy = now()->toDateString();
        $hoy = now()->format('Y-m-d'); 
    
        // Obtener todas las citas
        //$citas = Cita::with('expediente.user')->get();
        // Obtener todas las citas activas
        $citas = Cita::where('id_estado', 5)
                        ->with('expediente.user')
                        ->orderBy('fechahora', 'asc')->get();
        
        // Contar todas las citas en la base de datos
        //$totalCitas = Cita::count();
        // Contar todas las citas activas
        $totalCitas = Cita::where('id_estado', 5)->count();
                
        // Contar citas del día de hoy
        //$totalCitasHoy = Cita::whereDate('fechahora', $hoy)->count();
        // Contar citas activas del día de hoy
        $totalCitasHoy = Cita::where('id_estado', 5)
                                ->whereDate('fechahora', $hoy)
                                ->count();

                                 // Obtener la próxima cita activa (la más cercana en el futuro)
    $proximaCita = Cita::where('id_estado', 5)
    ->where('fechahora', '>', now())
    ->with('expediente.user')
    ->orderBy('fechahora', 'asc')
    ->first();

     // Citas completadas hoy (asumiendo que el estado 6 es "completada")
     $citasHoyCompletadas = Cita::where('id_estado', 6)
     ->whereDate('fechahora', $hoy)
     ->count();

        return view('dashboard', compact('citas', 'totalCitas', 'totalCitasHoy', 'proximaCita', 'citasHoyCompletadas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $expedientes = expediente::all(); // Obtener expedientes
        $citas = Cita::with('usuario')->get();
        $estados = Estado::whereIn('id', [5,6,7])->get();
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
        $estados = Estado::whereIn('id', [5,6,7])->get();
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
