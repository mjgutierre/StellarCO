@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="container">
    <div class="breadcrumbs">
        <a href="{{ route('admin.index') }}">Inicio</a> /
        <a href="{{ route('admin.product.index') }}">Productos</a> /
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

                    @foreach($viewData["product"]->getReviews() as $review) 
                        <div class="review">
                            <h5 class="product-title">{{ $review->getTitle() }}</h5><br/>
                            <p>{{ $review->getDescription() }}</p><br/>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-5">
                    <form action="{{ route('admin.product.update', $viewData['product']->getId()) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <h2>Actualiza el producto</h2>
                        <div class="mb-2">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $viewData['product']->getName() }}" required>
                        </div>
                        <div class="mb-2">
                            <label for="description" class="form-label">Descripción</label>
                            <input type="text" name="description" id="description" class="form-control" value="{{ $viewData['product']->getDescription() }}" required>
                        </div>
                        <div class="mb-2">
                            <label for="price" class="form-label">Precio</label>
                            <input type="number" name="price" id="price" class="form-control" value="{{ $viewData['product']->getPrice() }}" required>
                        </div>
                        <div class="mb-2">
                            <label for="quantity" class="form-label">Cantidad</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $viewData['product']->getQuantity() }}" required>
                        </div>
                        <div class="mb-2">
                            <label for="location" class="form-label">Ubicación</label>
                            <input type="text" name="location" id="location" class="form-control" value="{{ $viewData['product']->getLocation() }}" required>
                        </div>
                        <div class="button-group">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                    <form action="{{ route('admin.product.destroy', $viewData['product']->getId()) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
