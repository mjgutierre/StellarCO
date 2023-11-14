@extends('layouts.app')
@section('title', $viewData['title'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <h2 class="container-h2">Checkout</h2>
            <div class="row">
                @forelse ($viewData["products"] as $product)
                <div class="col-md-4">
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">@lang('messages.Name'): {{ Str::limit($product->getName(), 10) }}</h5>
                            <p class="card-text">@lang('messages.ProductDescription'): {{ Str::limit($product->getDescription(), 95) }}</p>
                            <p class="card-subtitle">@lang('messages.ProductPrice'): ${{ $product->getPrice() }}</p>
                            <p class="card-text">@lang('messages.quantity'): {{ $product->quantity }}</p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <p class="text-center text-muted">@lang('messages.NoElementsInCart')</p>
                </div>
                @endforelse
            </div>
        </div>

        <div class="col-md-3">
            <div class="order-summary">
                <div class="card mb-3">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fas fa-shopping-cart"></i> OrderSummary</h4>
                        <ul class="list-unstyled">
                            @foreach ($viewData["products"] as $product)
                            <li>{{ $product->getName() }} - ${{ $product->getPrice() }} x {{ $product->quantity }} = ${{ $product->getPrice() * $product->quantity }}</li>
                            @endforeach
                        </ul>
                        <p><strong>Total Amount</strong> ${{ $viewData['total'] }}</p>
                        <form action="{{ route('checkout.confirm') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="address">@lang('messages.Address')</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Confirm Buy</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
@endsection