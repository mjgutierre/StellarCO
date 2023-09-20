@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<div class="container">
    <div class="breadcrumbs">
        <a href="{{ route('home.index') }}">Inicio</a> /
        <a href="{{ route('product.index') }}">Productos</a> /
        {{ $viewData["product"]->getName() }} 
    </div>
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ $viewData['product']->getImage() }}" alt="{{ $viewData['product']->getName() }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-details">
                        <h2 class="product-title">{{ $viewData["product"]->getName() }}</h2>
                        <p class="product-price">Precio: ${{ $viewData["product"]->getPrice() }}</p>
                        <p class="product-quantity">Cantidad: {{ $viewData["product"]->getQuantity() }}</p>
                        <p class="product-location">Ubicación: {{ $viewData["product"]->getLocation() }}</p>
                        <p class="product-description">Descripción: {{ $viewData["product"]->getDescription() }}</p>
                        <button class="btn btn-primary">Agregar al carrito</button><!-- si esta registrado -->
                    </div>
                </div>
            </div>
            
            @foreach($viewData["product"]->getReviews() as $review) 
                    <div class="review">
                        <h5 class="product-title">{{ $review->getTitle() }}</h5><br/>
                        <p>{{ $review->getDescription() }}</p><br/>
                    </div>
            @endforeach
        </div>
        <div class="container">
          <h3>Deja tu comentario</h3>
          <form method="POST" action="{{ route('review.save', ['id'=> $viewData["product"]->getId()]) }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Titulo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Ingrese el titulo" required />
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Descripción</label>
              <input type="text" class="form-control" id="description" name="description" placeholder="Ingrese la descripción" required />
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        </div>
@endsection