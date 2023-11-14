@extends('layouts.app')

@section('title', $viewData['title'])

@section('content')
<div class="container user-profile-container">
    <div class="row">
        <div class="col-md-3 offset-md-3">
            <div class="user-profile-card card">
                <div class="user-profile-header card-header">
                    <h2 class="user-profile-title">Perfil de Usuario</h2>
                </div>
                <div class="user-profile-body card-body">
                    <div class="user-profile-info">
                        <div class="user-profile-item">
                            <i class="fas fa-user user-profile-icon"></i>
                            <label for="name" class="form-label">Nombre</label>
                            <div class="user-profile-value">{{ $viewData['user']->getName() }}</div>
                        </div>
                        <div class="user-profile-item">
                            <i class="fas fa-envelope user-profile-icon"></i>
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <div class="user-profile-value">{{ $viewData['user']->getEmail() }}</div>
                        </div>
                        <div class="user-profile-item">
                            <i class="fas fa-wallet user-profile-icon"></i>
                            <label for="balance" class="form-label">Saldo</label>
                            <div type="text" class="user-profile-value">${{ number_format($viewData['user']->getBalance(), 2) }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection