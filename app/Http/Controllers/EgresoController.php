<?php

namespace App\Http\Controllers;

use App\Models\Egreso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EgresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(Gate::allows('ver_egresos'), 403);

        return view('egresos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(Gate::allows('manipular_egresos'), 403);

        return view('egresos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_unless(Gate::allows('manipular_egresos'), 403);

        $request->validate([
            'monto' => ['required','numeric', 'max:30000'],
            'tipo_egreso_id' => ['required','numeric','integer','exists:tipo_egresos,id'],
            'detalle' => ['nullable','string','min:10','max:600'],
            'ruta_comprobante' => ['nullable','image','max:4096'],
        ]);

        if($request->file('ruta_comprobante')){
            $ruta_comprobante = $request->file('ruta_comprobante')->store('comprobantes/egresos');
        }else{
            $ruta_comprobante = null;
        }

        Egreso::create([
            'monto' => $request->monto,
            'tipo_egreso_id' => $request->tipo_egreso_id,
            'detalle' => $request->detalle,
            'ruta_comprobante' => $ruta_comprobante,
            'user_id' => auth()->user()->id //usuario que está haciendo el registro del pago (operador)
        ]);

        return redirect()->route('egresos.index')->with('success','Egreso registrado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Egreso $egreso)
    {
        abort_unless(Gate::allows('ver_egresos'), 403);

        return view('egresos.show', compact('egreso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Egreso $egreso)
    {
        abort_unless(Gate::allows('manipular_egresos'), 403);

        if($egreso->created_at > now()->subMonth(1) ){
            $egreso->delete();
            return redirect()->route('egresos.index')->with('success', 'Egreso anulado satisfactoriamente.');
        }else{
            return redirect()->back()->with('danger', 'No puedes anular un registro con más de un mes de antiguedad.');
        }
    }
}
