<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;

class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(Gate::allows('ver_ingresos'), 403);

        return view('ingresos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(Gate::allows('manipular_ingresos'), 403);

        return view('ingresos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_unless(Gate::allows('manipular_ingresos'), 403);

        $request->validate([
            'monto' => ['required','numeric', 'max:50000'],
            'tipo_ingreso_id' => ['required','numeric','integer','exists:tipo_ingresos,id'],
            'detalle' => ['nullable','string','min:10','max:600'],
            'ruta_comprobante' => ['nullable','image','max:4096'],
        ]);

        if($request->tipo_ingreso_id == 1){
            $request->validate([
                'inmueble_id' => ['required', 'integer','exists:inmuebles,id'],
                'pagado_hasta' => ['required', 'date'],
                'nombres' => ['required', 'string', 'max:50'],
            ]);
        }

        if($request->file('ruta_comprobante')){
            $ruta_comprobante = $request->file('ruta_comprobante')->store('comprobantes/ingresos');
        }else{
            $ruta_comprobante = null;
        }

        $ingreso = Ingreso::create([
            'monto' => $request->monto,
            'tipo_ingreso_id' => $request->tipo_ingreso_id,
            'detalle' => $request->detalle,
            'ruta_comprobante' => $ruta_comprobante,
            'user_id' => auth()->user()->id //usuario que está haciendo el registro del pago (operador)
        ]);

        if($request->tipo_ingreso_id == 1){
            $ingreso->inmueble()->attach($request->inmueble_id,[
                'pagado_hasta' => Carbon::createFromFormat('Y-m', $request->pagado_hasta),
                'nombres' => 'Nombre Completo',
            ]);
        }

        return redirect()->route('ingresos.index')->with('success','Ingreso registrado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ingreso $ingreso)
    {
        abort_unless(Gate::allows('ver_ingresos'), 403);

        return view('ingresos.show', compact('ingreso'));
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
    public function destroy(Ingreso $ingreso)
    {
        abort_unless(Gate::allows('manipular_ingresos'), 403);

        if($ingreso->created_at > now()->subMonth(1) ){
            $ingreso->delete();
            return redirect()->route('ingresos.index')->with('success', 'Ingreso anulado satisfactoriamente.');
        }else{
            return redirect()->back()->with('danger', 'No puedes anular un registro con más de un mes de antiguedad.');
        }
    }
}
