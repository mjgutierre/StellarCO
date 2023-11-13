@extends('layouts.app')

@section('title', $viewData['title'])

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" value="{{ $viewData['user']->getName() }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" value="{{ $viewData['user']->getEmail() }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="balance" class="form-label">Balance</label>
                            <input type="text" class="form-control" id="balance" value="${{ number_format($viewData['user']->getBalance(), 2) }}" readonly>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
