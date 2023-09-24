@extends('layouts.app')
@section('title', 'ShoppingCart')
@section('content')

    @if(session()->has('success'))
        {{ session()->get('success') }}
    @endif

    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif

    @forelse ($items as $key => $item)
        <div class="cart">
            <p>@lang('messages.ProductId'): {{ $item['product_id'] }} </p>
            <p>@lang('messages.ProductPrice'): ${{ $item['price'] }}</p>
            <p>@lang('messages.ProductDescription'): {{ $item['description'] }}</p>
            <p>@lang('messages.quantity'): {{ $item['quantity'] }}</p>

            <form action="{{ route('items.destroy', $item['product_id']) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">@lang('messages.delete')</button>
            </form>
        </div>
    @empty
        <p class="cart-content">No hay elementos en el carrito.</p>
    @endforelse
@endsection
