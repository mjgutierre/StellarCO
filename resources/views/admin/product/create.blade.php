@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="container">
    <h2>Crear Nuevo Producto</h2>
    <div class="row justify-content-center align-items-center mt-5">
        <div class="col-md-5">
            <div class="card custom-card create">
                <div class="card-body">
                    <h5 class="card-title">@lang('messages.CreateNewRocket')</h5>
                    <form method="POST" action="{{ route('admin.product.save') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">@lang('messages.name')</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Ingrese el nombre" required />
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">@lang('messages.description')</label>
                            <input type="text" class="form-control" id="description" name="description"  value="{{ old('description') }}" placeholder="Ingrese la descripción" required />
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">@lang('messages.price')</label>
                            <input type="number" class="form-control" id="price" name="price"  value="{{ old('price') }}" placeholder="Ingrese el precio" required />
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">@lang('messages.quantity')</label>
                            <input type="number" class="form-control" id="quantity" name="quantity"  value="{{ old('quantity') }}" placeholder="Ingrese la cantidad" required />
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">@lang('messages.location')</label>
                            <input type="text" class="form-control" id="location" name="location"  value="{{ old('location') }}" placeholder="Ingrese la ubicación" required />
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">@lang('messages.image')</label>
                            <input class="form-control" type="file" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">@lang('messages.send')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop