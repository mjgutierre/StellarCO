@extends('layouts.app')
@section('title', 'Carrito de compras')
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
        <div class="review">
            <p>Id del producto: {{ $item['product_id'] }} </p>
            <p>Precio del producto: ${{ $item['price'] }}</p>
            <p>Descripción del producto: {{ $item['description'] }}</p>
            <p>Cantidad: {{ $item['quantity'] }}</p>

            <form action="{{ route('items.destroy', $item['product_id']) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">@lang('messages.delete')</button>
            </form>
        </div>
    @empty
        <p>No hay elementos en el carrito.</p>
    @endforelse
@endsection
