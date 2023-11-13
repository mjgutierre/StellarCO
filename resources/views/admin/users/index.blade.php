<!-- Created By Sebastian Arias -->
@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="container-fluid d-flex justify-content-center indexproducts">
    <div class="row mt-5">
        @foreach ($viewData["users"] as $user)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->getName() }}</h5>
                    <p class="card-text">@lang('messages.mail'): {{ $user->getEmail() }}</p>
                    <p class="card-text">@lang('messages.UserCreated'): {{ $user->getCreatedAt() }}</p>
                    <p class="card-text">@lang('messages.AccountBalance'): {{ $user->getBalance() }}</p>
                    <p class="card-text badge rounded-pill bg-success">@lang('messages.role'): {{ $user->getRole() }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection