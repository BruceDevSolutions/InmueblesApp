<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mantenimiento;
use Illuminate\Support\Facades\Gate;

class MantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mantenimientos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(Gate::allows('agregar_tareas'), 403);
        
        return view('mantenimientos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_unless(Gate::allows('agregar_tareas'), 403);

        $request->validate([
            'titulo' => ['required','max:50', 'string'],
            'detalle' => ['required','max:600', 'string'],
            'imagen' => ['nullable','image','max:4096'],
            'presupuesto' =>  ['required','numeric', 'max:50000'],
        ]);

        if($request->file('imagen')){
            $ruta_imagen = $request->file('imagen')->store('/mantenimiento');
        }else{
            $ruta_imagen = '';
        }

        Mantenimiento::create([
            'titulo' => $request->titulo,
            'detalle' => $request->detalle,
            'imagen' => $ruta_imagen,
            'presupuesto' => $request->presupuesto,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('mantenimientos.index')->with('success','Tarea de mantenimiento registrada satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mantenimiento  $mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Mantenimiento $mantenimiento)
    {
        return view('mantenimientos.show', compact('mantenimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mantenimiento  $mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Mantenimiento $mantenimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mantenimiento  $mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mantenimiento $mantenimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mantenimiento  $mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mantenimiento $mantenimiento)
    {
        abort_unless(Gate::allows('manipular_tareas'), 403);

        if($mantenimiento->created_at > now()->subMonth(1) ){
            $mantenimiento->delete();
            return redirect()->route('mantenimientos.index')->with('success', 'Mantenimiento anulado satisfactoriamente.');
        }else{
            return redirect()->back()->with('danger', 'No puedes anular un registro con más de un mes de antiguedad.');
        }
    }

    public function aprobar(Mantenimiento $mantenimiento)
    {
        abort_unless(Gate::allows('manipular_tareas'), 403);

        $mantenimiento->update([
            'status' => true
        ]);

        return redirect()->route('mantenimientos.index')->with('success', 'mantenimiento aprobado satisfactoriamente');
    }
}
