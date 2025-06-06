<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EconomicoController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\DashboardpacienteController;



Route::get('/', function () {
    return view('welcome');
});

Route::fallback(function () {
    if (Auth::check()) {
        $rol = Auth::user()->id_rol;

        if ($rol === 1) {
            return redirect()->route('dashboard');
        } elseif ($rol === 2) {
            return redirect()->route('dashboardpaciente.index');
        } else {
            Auth::logout();
            return redirect('/')->withErrors('Rol desconocido.');
        }
    }

    return redirect('/');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:1'])->name('dashboard');
Route::get('/dashboardpaciente', function () {
    return view('dashboardpaciente');
})->middleware(['auth', 'verified', 'role:2'])->name('dashboardpaciente.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/create', [UsuariosController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios', [UsuariosController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/{usuarios}', [UsuariosController::class, 'show'])->name('usuarios.show');
    Route::get('/usuarios/{usuarios}/edit', [UsuariosController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{usuarios}', [UsuariosController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{usuarios}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');
});



Route::middleware(['auth', 'role:1'])->group(function () {

    Route::get('/dash-expediente', [ExpedienteController::class, 'dash'])->name('expediente.dash');

    Route::get('/expediente', [ExpedienteController::class, 'index'])->name('expediente.index');
    Route::get('/expediente/create', [ExpedienteController::class, 'create'])->name('expediente.create');
    Route::post('/expediente', [ExpedienteController::class, 'store'])->name('expediente.store');
    Route::get('/expediente/{expediente}', [ExpedienteController::class, 'show'])->name('expediente.show');
    Route::get('/expediente/{expediente}/edit', [ExpedienteController::class, 'edit'])->name('expediente.edit');
    Route::put('/expediente/{expediente}', [ExpedienteController::class, 'update'])->name('expediente.update');
    Route::delete('/expediente/{expediente}', [ExpedienteController::class, 'destroy'])->name('expediente.destroy');

});

Route::middleware(['auth', 'role:1'])->group(function () {

    //Route::get('/dashboard', [CitaController::class, 'dash'])->name('cita.dash');
    Route::get('/dashboard', [CitaController::class, 'dashboard'])->name('dashboard');
    
    Route::get('/cita', [CitaController::class, 'index'])->name('cita.index');
    Route::get('/cita/create', [CitaController::class, 'create'])->name('cita.create');
    Route::post('/cita', [CitaController::class, 'store'])->name('cita.store');
    Route::get('/cita/{cita}', [CitaController::class, 'show'])->name('cita.show');
    Route::get('/cita/{cita}/edit', [CitaController::class, 'edit'])->name('cita.edit');
    Route::put('/cita/{cita}', [CitaController::class, 'update'])->name('cita.update');
    Route::delete('/cita/{cita}', [CitaController::class, 'destroy'])->name('cita.destroy');

});

Route::middleware(['auth', 'role:1'])->group(function () {

    Route::get('/economico', [EconomicoController::class, 'index'])->name('economico.index');
    Route::get('/economico/create', [EconomicoController::class, 'create'])->name('economico.create');
    Route::post('/economico', [EconomicoController::class, 'store'])->name('economico.store');
    Route::get('/economico/{economico}', [EconomicoController::class, 'show'])->name('economico.show');
    Route::get('/economico/{economico}/edit', [EconomicoController::class, 'edit'])->name('economico.edit');
    Route::put('/economico/{economico}', [EconomicoController::class, 'update'])->name('economico.update');
    Route::delete('/economico/{economico}', [EconomicoController::class, 'destroy'])->name('economico.destroy');

});


Route::middleware(['auth', 'role:2'])->group(function () {
  
    Route::get('/dashboardpaciente', [DashboardpacienteController::class, 'index'])->name('dashboardpaciente.index');
    Route::get('/dashboardpaciente/create', [DashboardpacienteController::class, 'create'])->name('dashboardpaciente.create');
    Route::post('/dashboardpaciente', [DashboardpacienteController::class, 'store'])->name('dashboardpaciente.store');
    Route::get('/dashboardpaciente/{dashboardpaciente}', [DashboardpacienteController::class, 'show'])->name('dashboardpaciente.show');
    Route::get('/dashboardpaciente/{dashboardpaciente}/edit', [DashboardpacienteController::class, 'edit'])->name('dashboardpaciente.edit');
    Route::put('/dashboardpaciente/{dashboardpaciente}', [DashboardpacienteController::class, 'update'])->name('dashboardpaciente.update');
    Route::delete('/dashboardpaciente/{dashboardpaciente}', [DashboardpacienteController::class, 'destroy'])->name('dashboardpaciente.destroy');

});

Route::middleware(['auth', 'role:2'])->group(function () 
{

    Route::get('/faq', function () 
    {
        return view('faq');
    })->name('faq');

});

Route::get('/ingresos-por-cliente', function () {
    $result = DB::select("CALL ingresos_por_cliente()");
    return response()->json($result);
});

Route::get('/ingresos-mensuales', function () {
    $result = DB::select("CALL ingresos_mensuales()");
    return response()->json($result);
});

Route::get('/ingresos-por-cliente-filtrado', function (Request $request) {
    $nombre = $request->input('nombre');
    $result = DB::select("CALL ingresos_por_clientefiltrado(?)", [$nombre]);
    return response()->json($result);
});

Route::get('/ingresos-mensuales-filtrados', function (Request $request) {
    $fecha = $request->input('fecha');
    $result = DB::select("CALL ingresos_mensualesfiltrados(?)", [$fecha]);
    return response()->json($result);
});


require __DIR__.'/auth.php';
