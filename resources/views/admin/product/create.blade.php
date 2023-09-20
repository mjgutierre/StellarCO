@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center mt-5">
        <div class="col-md-6">
            <div class="card custom-card create">
                <div class="card-body">
                    <h5 class="card-title">Crea un nuevo cohete</h5>
                    <form method="POST" action="{{ route('admin.product.save') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese el nombre" required />
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="Ingrese la descripción" required />
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Precio</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Ingrese el precio" required />
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Ingrese la cantidad" required />
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Ubicación</label>
                            <input type="text" class="form-control" id="location" name="location" placeholder="Ingrese la ubicación" required />
                        </div>
                        <div class="mb-3">
                            <label for="Imagen" class="form-label">Imagen</label>
                            <input class="form-control" type="file" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop