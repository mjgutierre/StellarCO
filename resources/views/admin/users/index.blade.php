<!-- Created By Sebastian Arias -->
@extends('layouts.admin')
@section('title', $viewData['title'])

@section('content')
<div class="container-fluid">
    <h2 class="text-center mb-5">Lista de Usuarios</h2>
    <div class="row">
        @foreach ($viewData["users"] as $user)
        <div class="col-md-4 mb-4">
            <div class="card user-card">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{ $user->getName() }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>@lang('messages.mail'):</strong> {{ Str::limit($user->getEmail() , 30)}}</p>
                    <p class="card-text"><strong>@lang('messages.UserCreated'):</strong>  {{ $user->getCreatedAt() }}</p>
                    <p class="card-text"><strong>@lang('messages.AccountBalance'):</strong> ${{ number_format($user->getBalance(), 2) }}</p>
                    <p class="card-text"><span class="badge rounded-pill bg-success">@lang('messages.role'): {{ $user->getRole() }}</span></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

