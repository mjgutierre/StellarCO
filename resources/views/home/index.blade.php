<!-- Autor del codigo Maria Jose Gutierrez Estrada -->
@extends('layouts.app')
@section('title', 'Home Page - StellarCO')
@section('content')
<header>
  <div class="static-image">
    <div class="overlay-content">
      <h5>HOLAAA @lang('messages.DiscoverAUniqueShoppingExperienceAtStellarCO')</h5>
      <p>@lang('messages.ExploreOurProductsNow')</p>
      <a href="{{ route('product.index') }}" class="btn btn-primary">@lang('messages.SeeProducts')</a>
    </div>
  </div>
  @endsection