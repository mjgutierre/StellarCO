@extends('layouts.app')
@section('title', $viewData['title'])

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <h2 class="text-success">Purchase Successful!</h2>
            <p>Thank you for your purchase. Your order has been placed successfully.</p>
            
            <div class="mt-4">
                <a href="{{ route('product.index') }}" class="btn btn-primary">Buy More</a>
                <a href="" class="btn btn-secondary">See Orders</a>
            </div>
        </div>
    </div>
</div>
@endsection
