<!-- Autor del codigo Maria Jose Gutierrez Estrada -->
@extends('layouts.app')
@section('title', 'Admin Page - StellarCO')
@section('content')
<header>
    <div class="static-image">
        <div class="overlay-content">
            <h5>Bienvenido Administrador</h5>
            <p>Aqui puedes gestionar tus productos.</p>
            <a href="{{ route('admin.product.index') }}" class="btn btn-primary">Empieza aqui</a>

            <p>Aqui puedes ver tus estadisticas.</p>
            <a href="{{ route('admin.statistics.index') }}" class="btn btn-primary">Click aqui</a>
        </div>
    </div>
@endsection