<!-- Created By Sebastian Arias -->

@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="container-fluid d-flex justify-content-center indexproducts">
    <div class="row mt-5">
        <div class="filters breadcrumbs">
            <div class="btn btn-primary">
                <a href="{{ route('admin.product.index') }}">@lang('messages.RestartFilters')</</a>
            </div>
        </div>
        
        @foreach ($viewData["products"] as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ $product->getImage() }}" class="card-img-top" alt="{{ $product->getName() }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->getName() }}</h5>
                    <p class="card-text">@lang('messages.price'): ${{ $product->getPrice() }}</p>
                    <p class="card-text">@lang('messages.quantity'): {{ $product->getQuantity() }}</p>
                    <p class="card-text">@lang('messages.location'): {{ $product->getLocation() }}</p>
                    <a href="{{ route('product.show', ['id'=> $product->getId()]) }}" class="btn btn-primary">@lang('messages.LearnMore')</a>

                    <form action="{{ route('admin.product.destroy', $product->getId()) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-danger">@lang('messages.delete')</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection