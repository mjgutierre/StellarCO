@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<div class="container-fluid d-flex justify-content-center indexproducts">
    <div class="row mt-5">

    <div class="filters breadcrumbs">
        <div class="btn btn-primary">
            <a href="{{ route('product.ordered-asc') }}">@lang('messages.QuantityFromSmallestToLargest')</a>
        </div>
        <div class="btn btn-primary">
            <a  href="{{ route('product.ordered-dsc') }}">@lang('messages.QuantityFromLargestToSmallest')</a>
        </div>
        <div class="btn btn-primary">
            <a href="{{ route('product.ordered-name-asc') }}">@lang('messages.NameAa-Zz')</a>
        </div>
        <div class="btn btn-primary">
            <a href="{{ route('product.ordered-name-dsc') }}">@lang('messages.NameZz-Aa')</a>
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
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
