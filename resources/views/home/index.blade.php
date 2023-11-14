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
  <div class="container mt-6">
    <h2 class="text-center mb-3">@lang('messages.newProducts')</h2>
    <div class="row">
      @foreach ($viewData['products'] as $product)
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-6">
        <div class="product-card">
          <img src="{{ $product->getImage() }}" class="product-image" alt="{{ $product->getName() }}">
          <div class="product-details">
            <h5 class="product-title">{{ $product->getName() }}</h5>
            <p class="product-description">{{ Str::limit($product->getDescription(), 80) }}</p>
            <ul class="product-meta">
              <li>@lang('messages.location'): {{ $product->getLocation() }}</li>
              <li>@lang('messages.quantity'): {{ $product->getQuantity() }}</li>
              <li>@lang('messages.price'): ${{ $product->getPrice() }}</li>
            </ul>
            <a href="{{ route('product.show', ['id'=> $product->getId()]) }}" class="btn btn-primary">@lang('messages.LearnMore')</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <!-- Sección About Us -->
  <div class="about-us-section">
    <h2 class="text-center mt-6">Sobre Nosotros</h2>
    <p class="text-center mt-3">Somos una empresa involucrada en el desarrollo de un sitio web de comercio electrónico de élite, 
      diseñado para proporcionar una experiencia de usuario excepcional. Este sitio es la puerta de entrada virtual 
      a un mundo de posibilidades espaciales personalizadas con un amplio catálogo de cohetes personalizados que abarca 
      una variedad de modelos y configuraciones. Esto realizado con herramientas de personalización avanzadas que 
      permiten a los clientes adaptar sus cohetes de acuerdo a una amplia gama de especificaciones.</p>
  </div>

  @endsection