<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrabajoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\TurnoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/***
 * Route::get('/', function () {
    return view('welcome');
});
 * 
 */

Route::get('/', [TrabajoController::class, 'index'])->name('welcome');
Route::get('/salida', [TrabajoController::class, 'salida'])->name('salida');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
/***
 * 
 * Registrar las horas laborales
 * 
 */
Route::post('/trabajos', [TrabajoController::class, 'store']);
Route::get('/turnos-show', [TrabajoController::class, 'showHoraInicio']);
Route::post('/trabajos/salidas', [TrabajoController::class, 'updateHoraSalida']);

/****
 * Admin de horas de trabajo
 * 
*/
Route::get('/trabajoRegistrado', [TrabajoController::class, 'showTrabajoRegistrado']);
Route::get('/empleados', [TrabajoController::class, 'showEmpleados']);
Route::get('/turnos', [TrabajoController::class, 'showTurnos']);



/****
 * 
 * Admin de Empleado
 * 
 */
Route::get('/empleados/create', [EmpleadoController::class, 'create']);
Route::post('/empleados', [EmpleadoController::class, 'store']);
Route::delete('/empleados/{empleado}', [EmpleadoController::class, 'destroy']);


/***
 * 
 * Admin de Turnos
 * 
 */
Route::get('/turnos/create', [TurnoController::class, 'create']);
Route::post('/turnos', [TurnoController::class, 'store']);
Route::delete('/turnos/{turno}', [TurnoController::class, 'destroy']);