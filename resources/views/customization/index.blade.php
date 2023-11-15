@extends('layouts.app')

@section('title', $viewData['title'])

@section('content')
<div class="container">
    <div class="breadcrumbs">
        <a href="{{ route('product.index') }}">@lang('messages.product')</a> /
        <a href="{{ route('cart.index') }}">Cart</a> /
        {{ $viewData["product"]->getName() }} 
    </div>
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="product-card">
                        <div class="product-image">
                            <h2>{{ $viewData['product']->getName() }}</h2>
                            <img src="{{ $viewData['product']->getImage() }}" class="img-fluid w-100" alt="{{ $viewData['product']->getName() }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('customization.generate') }}" method="post">
                        @csrf
                        <div class="design-prompt">
                            <h3>@lang('messages.designYourRocket')</h3>
                            <p>@lang('messages.designDescription')</p>
                            <textarea name="designDescription" id="designDescription" class="form-control" rows="4" placeholder= "@lang('messages.placeholderDesign')"></textarea>
                        </div>
                        <input type="hidden" name="productId" value="{{ $viewData['product']->getId() }}">
                        <button type="submit" class="btn btn-primary mt-3">@lang('messages.generateDesign')</button>
                    </form>
                    @if($viewData['generatedImageiUrl'] != '')
                      <div class="generated-design mt-4">
                          <h4>@lang('messages.generatedDesign')</h4>
                          <img id="generatedImage" src="{{ $viewData['generatedImageiUrl'] }}" alt="Generated design by AI" class="img-fluid w-100">
                      </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

