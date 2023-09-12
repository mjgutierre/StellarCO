@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<div class="container-fluid d-flex justify-content-center indexproducts">
    <div class="row mt-5">
        @foreach ($viewData["products"] as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ $product->getImage() }}" class="card-img-top" alt="{{ $product->getName() }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->getName() }}</h5>
                    <p class="card-text">Precio: ${{ $product->getPrice() }}</p>
                    <p class="card-text">Cantidad: {{ $product->getQuantity() }}</p>
                    <p class="card-text">Ubicación: {{ $product->getLocation() }}</p>
                    <a href="{{ route('product.show', ['id'=> $product->getId()]) }}" class="btn btn-primary">CONOCE MÁS</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
