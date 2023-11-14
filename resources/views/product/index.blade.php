@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<div class="container-fluid d-flex justify-content-center indexproducts">
  <div class="row mt-4 ">
    <div class="filters-dropdown">
      <h5>@lang('messages.Filters')</h5>
      <select class="form-select" onchange="location = this.value;">
        <option value="{{ route('product.index') }}">@lang('messages.AllProducts')</option>
        <option value="{{ route('product.ordered', ['order' => 'quantasc']) }}">@lang('messages.QuantityFromSmallestToLargest')</option>
        <option value="{{ route('product.ordered', ['order' => 'quantdesc']) }}">@lang('messages.QuantityFromLargestToSmallest')</option>
        <option value="{{ route('product.ordered', ['order' => 'nameasc']) }}">@lang('messages.NameAa-Zz')</option>
        <option value="{{ route('product.ordered', ['order' => 'namedesc']) }}">@lang('messages.NameZz-Aa')</option>
      </select>
    </div>

    <h2>@lang('messages.product')</h2>
    @foreach ($viewData["products"] as $product)
    <div class="card">
      <img src="{{ $product->getImage() }}" class="card-img-top" alt="{{ $product->getName() }}">
      <div class="card-body">
        <h5 class="card-title">{{ $product->getName() }}</h5>
        <p class="card-text">{{ $product->getDescription() }}</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"> @lang('messages.location'): {{ $product->getLocation() }}</li>
        <li class="list-group-item">@lang('messages.quantity'): {{ $product->getQuantity() }}</li>
        <li class="list-group-item">@lang('messages.price'): ${{ $product->getPrice() }}</li>
      </ul>
      <div class="card-body">
        <a href="{{ route('product.show', ['id'=> $product->getId()]) }}" class="card-link">@lang('messages.LearnMore')</a>
      </div>
    </div>
    @endforeach

  </div>
</div>
@endsection