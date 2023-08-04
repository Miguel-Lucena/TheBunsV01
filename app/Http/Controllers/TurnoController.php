<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.turno.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'name' => 'required|max:255'
        ]);  
    
            $turno = new Turno();
            $turno->name = $request->name;
            $turno->price = $request->precio;
            $turno->save();
            return redirect('/turnos');
    }

    /**
     * Display the specified resource.
     */
    public function show(Turno $turno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Turno $turno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Turno $turno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Turno $turno)
    {
        //dd($empleado);
        $turno->delete();
        return redirect('/turnos');
    
    }
}
