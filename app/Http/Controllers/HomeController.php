<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Inmueble;
use Illuminate\Http\Request;
use App\Models\Mantenimiento;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $total_inmuebles = Inmueble::all()->count();

        $total_inmuebles_comerciales = Inmueble::where('tipo_inmueble', Inmueble::LOCAL_COMERCIAL)->count();

        $total_inmuebles_viviendas = Inmueble::where('tipo_inmueble', Inmueble::DEPARTAMENTO)->count();

        $ingresos_total = DB::table('ingresos')
        ->select(DB::raw('SUM(monto) as total'))
        ->get();

        $egresos_total = DB::table('egresos')
        ->select(DB::raw('SUM(monto) as total'))
        ->get();

        $monto_disponible = $ingresos_total[0]->total - $egresos_total[0]->total;


        $ingresos_mes = DB::table('ingresos')->whereBetween('created_at',[Carbon::now()->subMonth(0)->startOfMonth()->toDateString(),Carbon::now()->subMonth(0)->endOfMonth()->toDateString()])
        ->select(DB::raw('SUM(monto) as total'))
        ->get();

        $egresos_mes = DB::table('egresos')->whereBetween('created_at',[Carbon::now()->subMonth(0)->startOfMonth()->toDateString(),Carbon::now()->subMonth(0)->endOfMonth()->toDateString()])
        ->select(DB::raw('SUM(monto) as total'))
        ->get();

        $tareas_pendientes = Mantenimiento::where('status', false)->count();

        $usuarios = User::count();

        return view('index', compact('total_inmuebles', 'monto_disponible', 'ingresos_mes', 'egresos_mes','usuarios','tareas_pendientes', 'total_inmuebles_comerciales', 'total_inmuebles_viviendas'));
    }
}
