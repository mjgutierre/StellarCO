@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<div class="containerstatistics">
    <div class="breadcrumbs">
        <a href="{{ route('admin.index') }}">Inicio</a> /
        Estadísticas
    </div>
    <h3 class="statistics-title">Estas son las estadísticas de tu negocio.</h3>
    <div class="row">
        <div class="four col-md-3">
            <div class="counter-box">
                <i class="fa fa-thumbs-o-up"></i>
                <p>Se han creado {{$viewData['rockets']}} cohetes.</p>
            </div>
        </div>
        <div class="four col-md-3">
            <div class="counter-box">
                <i class="fa fa-group"></i>
                <p>Tenemos ${{$viewData['countries']}} de dólares en cohetes.</p>
            </div>
        </div>
        <div class="four col-md-3">
            <div class="counter-box">
                <i class="fa fa-shopping-cart"></i>
                <p>Los clientes suelen tener {{$viewData['rocketsAvg']}} cohetes.</p>
            </div>
        </div>
        <div class="four col-md-3">
            <div class="counter-box">
                <i class="fa fa-user"></i>
                <p>Tenemos {{$viewData['usersCount']}} usuarios de tipo Customer.</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="filters breadcrumbs analytics">
                <div class="btn btn-primary">
                    <a href="{{ route('admin.statistics.users') }}"> Listar Usuarios</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection