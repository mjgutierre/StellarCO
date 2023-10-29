@extends('layouts.app')
@section('title', $viewData['title'])

@section('content')
<div class="row">
    @forelse ($viewData["products"] as $product)
    <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">@lang('messages.Name'): {{ $product->getName() }}</h5>
                <p class="card-text">@lang('messages.ProductDescription'): {{ $product->getDescription() }}</p>
                <p class="card-text">@lang('messages.ProductPrice'): ${{ $product->getPrice() }}</p>
                <p class="card-text">@lang('messages.quantity'): {{ $product->quantity }}</p>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <p class="text-center text-muted">@lang('messages.NoElementsInCart')</p>
    </div>
    @endforelse

    <div class="col-12 mt-4">
        <h4>OrderSummary</h4>
        <ul>
            @foreach ($viewData["products"] as $product)
            <li>{{ $product->getName() }} - ${{ $product->getPrice() }} x {{ $product->quantity }} = ${{ $product->getPrice() * $product->quantity }}</li>
            @endforeach
        </ul>
        <p><strong>Total Amount:</strong> ${{ $viewData['total'] }}</p>
    </div>

    <div class="col-12 mt-4">
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
@endsection

