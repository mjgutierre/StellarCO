@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<div class="container">
    <div class="breadcrumbs">
        <a href="{{ route('home.index') }}">Inicio</a> /
        <a href="{{ route('product.index') }}">Productos</a> /
        {{ $viewData["products"][0]->getName() }} 
    </div>
    <div class="row">
        <div class="container">
            <div class="row">
                @foreach ($viewData["products"] as $product)
                <div class="col-md-6">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ $product->getImage() }}" alt="{{ $product->getName() }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-details">
                        <h2 class="product-title">{{ $product->getName() }}</h2>
                        <p class="product-price">Precio: ${{ $product->getPrice() }}</p>
                        <p class="product-quantity">Cantidad: {{ $product->getQuantity() }}</p>
                        <p class="product-location">Ubicación: {{ $product->getLocation() }}</p>
                        <p class="product-description">Descripción: {{ $product->getDescription() }}</p>
                        <button class="btn btn-primary">Agregar al carrito</button><!-- si esta registrado -->
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endsection