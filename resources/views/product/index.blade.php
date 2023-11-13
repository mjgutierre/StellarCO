@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<div class="container-fluid d-flex justify-content-center indexproducts">
    <div class="row mt-5">

      <div class="filters breadcrumbs">
          <h5>@lang('messages.Filters')</h5>
          <div class="btn btn-primary">
              <a href="{{ route('product.ordered', ['order' => 'quantasc']) }}">@lang('messages.QuantityFromSmallestToLargest')</a>
          </div>
          <div class="btn btn-primary">
              <a  href="{{ route('product.ordered', ['order' => 'quantdesc']) }}">@lang('messages.QuantityFromLargestToSmallest')</a>
          </div>
          <div class="btn btn-primary">
              <a href="{{ route('product.ordered', ['order' => 'nameasc']) }}">@lang('messages.NameAa-Zz')</a>
          </div>
          <div class="btn btn-primary">
              <a href="{{ route('product.ordered', ['order' => 'namedesc']) }}">@lang('messages.NameZz-Aa')</a>
          </div>
          <div>
              <a href="{{ route('product.index') }}" class="btn btn-primary">@lang('messages.AllProducts')</a>
          </div>
      </div>

      @foreach ($viewData["products"] as $product)
        <div class="card" style="width: 18rem;">
          <img src="{{ $product->getImage() }}"  class="card-img-top" alt="{{ $product->getName() }}">
          <div class="card-body">
            <h5 class="card-title">{{ $product->getName() }}</h5>
            <p class="card-text">{{ $product->getDescription() }}</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"> @lang('messages.location'): {{ $product->getLocation() }}</li>
            <li class="list-group-item">@lang('messages.quantity'): {{ $product->getQuantity() }}</li>
            <li class="list-group-item">@lang('messages.price'): ${{ number_format($product->getPrice(), 2) }}</li>
          </ul>
          <div class="card-body">
            <a href="{{ route('product.show', ['id'=> $product->getId()]) }}" class="card-link">@lang('messages.LearnMore')</a>
          </div>
        </div>
      @endforeach
        
    </div>
</div>
@endsection
