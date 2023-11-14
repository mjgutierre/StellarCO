@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<div class="container user-profile-container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
                <h2>Perfil de Usuario</h2>
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="name" value="{{ $viewData['user']->getName() }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" value="{{ $viewData['user']->getEmail() }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="balance" class="form-label">Saldo</label>
                                <input type="text" class="form-control" id="balance" value="${{ number_format($viewData['user']->getBalance(), 2) }}" readonly>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection