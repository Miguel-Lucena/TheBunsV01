<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Trabajo;
use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Turno;
use Illuminate\Support\Facades\Route;
//use Illuminate\Support\Carbon1;
use Illuminate\Support\Facades\DB;


class TrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::all();
        $turnos = Turno::all();
        return view('welcome', ['empleados'=> $empleados, 'turnos'=>$turnos]);
    }

    public function salida()
    {
        $empleados = Empleado::all();
        $turnos = Turno::all();
        return view('RegistarHoraSalida', ['empleados'=> $empleados, 'turnos'=>$turnos]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function showHoraInicio(Request $request)
    {
        //{empleado: '1', turno: '1'}
    
        $registro = DB::table('trabajos')
                        ->where('empleado_id', '=' ,$request->input('empleado'))
                        ->where('turno_id', '=' ,$request->input('turno'))
                        ->whereNull('HoraFin')
                        ->latest('created_at')
                        ->first();
        return response()->json($registro);
    }


    public function showTrabajoRegistrado(){
        
        $turnoRegistrados = Trabajo::orderBy('id', 'desc')->get();
        //dd($turnoRegistrados);
        return view ('admin.RegistroTrabajo.index', ['turnoRegistrados'=>$turnoRegistrados]);
    }

    public function showEmpleados(){
        $empleados = Empleado::orderBy('id', 'desc')->get();
        return view ('admin.empleado.index', ['empleados'=>$empleados]);
    }

    public function showTurnos(){
        $turnos = Turno::orderBy('id', 'desc')->get();
        return view ('admin.turno.index', ['turnos'=>$turnos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'nombre' => 'required',
            'turno' => 'required'
        ]);  
        $trabajo = new Trabajo();
        $trabajo->empleado_id=$request->nombre;
        $trabajo->turno_id=$request->turno;
        $trabajo->HoraInicio = Carbon::now()->format('H:i');
        //$trabajo->HoraFin = $request->input('HoraFin');
        $trabajo->save();
        return view('registroHoraOK');
    }


    public function updateHoraSalida(Request $request){

       $registro = DB::table('trabajos')
                    ->where('empleado_id', $request->nombre)
                    ->where('turno_id', $request->turno)
                    ->whereNull('HoraFin')
                    ->latest('created_at')
                    ->first();
        
       
        if ($registro) {
        $horaInicio = Carbon::parse($registro->HoraInicio);
        $horaFin = Carbon::now();
        $diferenciaTiempo = $horaInicio->diffInMinutes($horaFin);
        $precioturno= Turno::where('id', $registro->turno_id)->first();
        $montoPagar = ($precioturno->price)/60 * $diferenciaTiempo;
        

        DB::table('trabajos')
            ->where('id', $registro->id)
            ->update([
                'HoraFin' => $horaFin->format('H:i'),
                'total' => $montoPagar
            ]);
        return view('registroHoraOK');
        } else {
            // Si no se encontró ningún registro, muestra un mensaje o redirige a una vista
            //return view('sinRegistro');
            // O puedes utilizar un mensaje flash y redirigir a la misma vista
            return back()->with('mensaje', 'El empleado no posee hora de ingreso para este día');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Trabajo $trabajo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trabajo $trabajo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trabajo $trabajo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trabajo $trabajo)
    {
        //
    }
}
