@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<div>
    <p class="analytics">Se han creado {{$viewData['rockets']}} cohetes.</p>
    <p class="analytics">Tenemos  ${{$viewData['countries']}} de dólares en cohetes.</p>
    <p class="analytics">Los clientes suelen tener {{$viewData['rocketsAvg']}} cohetes.</p>
    <p class="analytics">Tenemos {{$viewData['customerquant']}} usuarios de tipo Customer </p>
</div>
@endsection