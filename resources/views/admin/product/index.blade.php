@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="container-fluid d-flex justify-content-center indexproducts">
    <div class="row mt-4">
        <div class="filters-dropdown">
            <h5>@lang('messages.Filters')</h5>
            <select class="form-select" onchange="location = this.value;">
                <option value="{{ route('admin.product.index') }}">@lang('messages.AllProducts')</option>
                <option value="{{ route('admin.product.ordered', ['order' => 'quantasc']) }}">@lang('messages.QuantityFromSmallestToLargest')</option>
                <option value="{{ route('admin.product.ordered', ['order' => 'quantdesc']) }}">@lang('messages.QuantityFromLargestToSmallest')</option>
                <option value="{{ route('admin.product.ordered', ['order' => 'nameasc']) }}">@lang('messages.NameAa-Zz')</option>
                <option value="{{ route('admin.product.ordered', ['order' => 'namedesc']) }}">@lang('messages.NameZz-Aa')</option>
            </select>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="download-container d-flex align-items-center justify-content-start p-3">
                        <h5 class="mr-3 texto-h5">@lang('messages.download')</h5>
                        <a href="{{ route('products.download', ['type' => 'csv']) }}" class="btn btn-warning mr-2">@lang('messages.download') CSV</a>
                        <a href="{{ route('products.download', ['type' => 'txt']) }}" class="btn btn-warning">@lang('messages.download') TXT</a>
                    </div>
                </div>
            </div>
        </div>

        <h2>@lang('messages.product')</h2>
        @foreach ($viewData["products"] as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ $product->getImage() }}" class="card-img-top" alt="{{ $product->getName() }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->getName() }}</h5>
                    <p class="card-text">@lang('messages.price'): ${{ number_format($product->getPrice(), 2) }}</p>
                    <p class="card-text">@lang('messages.quantity'): {{ $product->getQuantity() }}</p>
                    <p class="card-text">@lang('messages.location'): {{ $product->getLocation() }}</p>
                    
                        <a href="{{ route('admin.product.show', ['id'=> $product->getId()]) }}" class="btn btn-primary">@lang('messages.LearnMore')</a>
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