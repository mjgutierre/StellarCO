@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <div class="confirmation-message">
                <i class="fas fa-check-circle text-success"></i> <!-- Icono de éxito -->
                <h2 class="text-success display-4">Purchase Successful!</h2>
                <p class="lead">Thank you for your purchase. Your order has been placed successfully.</p>

                <div class="mt-5">
                    <a href="{{ route('product.index') }}" class="btn btn-primary btn-lg">Buy More</a>
                    <a href="{{ route('order.index') }}" class="btn btn-secondary btn-lg">See Orders</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection