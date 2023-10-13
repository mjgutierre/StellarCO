@extends('layouts.app')
@section('title', 'ShoppingCart')

@if(session()->has('success'))
  {{ session()->get('success') }}
@endif

@if(session()->has('error'))
<div class="alert alert-danger">
    {{ session()->get('error') }}
</div>
@endif



@section('content')
  @forelse ($viewData["products"] as $product)
    <div class="cart">
      <p>@lang('messages.Name'): {{ $product->getName() }}</p>
        <p>@lang('messages.ProductPrice'): ${{ $product->getPrice() }}</p>
        <p>@lang('messages.ProductDescription'): {{ $product->getDescription() }}</p>
        <p>@lang('messages.quantity'): {{ $product->quantity }}</p>

        <form action="{{ route('items.destroy', $product->getId()) }}" method="POST"> 
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">@lang('messages.delete')</button>
        </form>
        <form action="#" method="POST">
          @csrf
          <button type="submit" class="btn btn-primary">@lang('messages.Buy')</button>
      </form>
    </div>
  @empty
  <p class="cart-content">@lang('messages.NoElementsInCart')</p>
  @endforelse

  @if ($viewData["products"])
    <div class="amount-to-pay">
      <p>@lang('messages.AmountToPay'): ${{ $viewData["totalToPay"] }}</p>
    </div>
  @endif
@endsection

