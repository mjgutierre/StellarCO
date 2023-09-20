@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<div class="container-fluid d-flex justify-content-center indexproducts">
    <div class="row mt-5">

    <div class="filters breadcrumbs">
        <div class="btn btn-primary">
            <a href="{{ route('admin.product.ordered-asc') }}">Cantidad de menor a mayor</a>
        </div>
        <div class="btn btn-primary">
            <a  href="{{ route('admin.product.ordered-dsc') }}">Cantidad de mayor a menor</a>
        </div>
        <div class="btn btn-primary">
            <a href="{{ route('admin.product.ordered-name-asc') }}">Nombre Aa-Zz</a>
        </div>
        <div class="btn btn-primary">
            <a href="{{ route('admin.product.ordered-name-dsc') }}">Nombre Zz-Aa</a>
        </div>
    </div>

        @foreach ($viewData["products"] as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ $product->getImage() }}" class="card-img-top" alt="{{ $product->getName() }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->getName() }}</h5>
                    <p class="card-text">Precio: ${{ $product->getPrice() }}</p>
                    <p class="card-text">Cantidad: {{ $product->getQuantity() }}</p>
                    <p class="card-text">Ubicación: {{ $product->getLocation() }}</p>
                    <a href="{{ route('admin.product.show', ['id'=> $product->getId()]) }}" class="btn btn-primary">VER PRODUCTO</a>
                    
                    <form action="{{ route('admin.product.destroy', $product->getId()) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
