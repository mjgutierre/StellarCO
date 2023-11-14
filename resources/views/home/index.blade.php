<!-- Autor del codigo Maria Jose Gutierrez Estrada -->
@extends('layouts.app')
@section('title', 'Home Page - StellarCO')
@section('content')
  <div class="static-image">
    <div class="overlay-content">
      <h5>@lang('messages.DiscoverAUniqueShoppingExperienceAtStellarCO')</h5>
      <p>@lang('messages.ExploreOurProductsNow')</p>
      <a href="{{ route('product.index') }}" class="btn btn-primary">@lang('messages.SeeProducts')</a>
    </div>
  </div>
  <div>
    <h2 class="text-center mt-5">@lang('messages.newProducts')</h2>
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
@endsection