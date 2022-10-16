@extends('adminlte::page')

@section('title', 'Bienvenido')

@section('content_header')
    <h1>Bienvenido</h1>
@stop

@section('content')
    <p>Bienvenido a la aplicación de administración de Propiedad Horizontal.</p>

    @can('ver_dashboard')
        <div class="container-fluid">
            {{-- Primer fila --}}
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{number_format($monto_disponible,2)}}bs. </h3>
                            <p>Efectivo disponible</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('ingresos.index') }}" class="small-box-footer">Ver ingresos <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{number_format($ingresos_mes[0]->total,2)}}bs. </h3>
                            <p>Ingresos este mes</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('ingresos.index') }}" class="small-box-footer">Ver ingresos <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{number_format($egresos_mes[0]->total,2)}}bs. </h3>
                            <p>Gastos este mes</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ route('egresos.index') }}" class="small-box-footer">Ver egresos<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $tareas_pendientes }}</h3>
                            <p>Tareas pendientes</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('mantenimientos.index')}}" class="small-box-footer">Ver tareas de mantenimiento <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            {{-- Segunda fila --}}
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-house-user"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Inmuebles registrados</span>
                            <span class="info-box-number">
                                {{ $total_inmuebles }}
                            </span>
                        </div>
                    </div>
                </div>
            
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-house-user"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Locales comerciales</span>
                            <span class="info-box-number">
                                {{ $total_inmuebles_comerciales }}
                            </span>
                        </div>
                    </div>
                </div>
            
            
                <div class="clearfix hidden-md-up"></div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-house-user"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Viviendas</span>
                            <span class="info-box-number">
                                {{ $total_inmuebles_viviendas }}
                            </span>
                        </div>
                    </div>
                </div>
            
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Usuarios registrados</span>
                            <span class="info-box-number">{{ $usuarios }}</span>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    @endcan
   
@stop

@section('css')
  {{--   <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop