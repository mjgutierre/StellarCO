@extends('layouts.app')
@section('title', $viewData['title'])

@if(session()->has('success'))
  {{ session()->get('success') }}
@endif

@if(session()->has('error'))
<div class="alert alert-danger">
    {{ session()->get('error') }}
</div>
@endif


@section('content')
<div class="row">
    @forelse ($viewData["products"] as $product)
    <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">@lang('messages.Name'): {{ $product->getName() }}</h5>
                <p class="card-text">@lang('messages.ProductDescription'): {{ $product->getDescription() }}</p>
                <p class="card-text">@lang('messages.ProductPrice'): ${{ number_format($product->getPrice(), 2) }}</p>
                <p class="card-text">@lang('messages.quantity'): {{ $product->quantity }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <form action="{{ route('cart.destroy', $product->getId()) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">@lang('messages.delete')</button>
                        </form>
                    </div>
                    <a href="{{ route('customization.index', ['id'=> $product->getId()]) }}">Customize</a>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <p class="text-center text-muted">@lang('messages.NoElementsInCart')</p>
    </div>
    @endforelse
</div>

@if ($viewData["products"])
<div class="mt-4">
  <div class="alert alert-info">
      <h5>@lang('messages.AmountToPay'): ${{ number_format($viewData["totalToPay"], 2) }}</h5>
      @auth
          <a href="{{ route('checkout.index') }}">
              <button type="submit" class="btn btn-sm btn-primary">@lang('messages.Buy')</button>
          </a>
      @endauth
      @guest
          <p>@lang('messages.SignInToBuy')</p>
      @endguest
  </div>
</div>
@endif
@endsection
