<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Inmueble;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class InmuebleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(Gate::allows('consultar_inmuebles'), 403);

        return view('inmuebles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function show(Inmueble $inmueble)
    {
        return view('inmuebles.show', compact('inmueble'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function edit(Inmueble $inmueble)
    {
        abort_unless(Gate::allows('actualizar_inmuebles'), 403);

        $users = User::where('user_type', '2')->get();

        return view('inmuebles.edit', compact('inmueble', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inmueble $inmueble)
    {
        abort_unless(Gate::allows('actualizar_inmuebles'), 403);

        $validado = $request->validate([
            'user_id' => 'required|max:255|exists:users,id',
            'monto_expensa' => 'required|integer|max-digits:4',
        ]);

        $inmueble->update($validado);

        return redirect()->route('inmuebles.index')->with('success','Inmueble actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inmueble $inmueble)
    {
        //
    }
}
