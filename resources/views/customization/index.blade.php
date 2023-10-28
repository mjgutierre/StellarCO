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
                    <div class="design-prompt">
                        <h3>Design your Rocket</h3>
                        <p>Provide a description for the AI to create a custom design for your rocket.</p>
                        <textarea id="designDescription" class="form-control" rows="4" placeholder="E.g., I want a galaxy theme with bright stars and a crescent moon."></textarea>
                        <button id="generateDesign" class="btn btn-primary mt-3">Generate Design</button>
                    </div>
                    <div class="generated-design mt-4">
                        <h4>Generated Design</h4>
                        <img id="generatedImage" src="" alt="Generated design by AI" class="img-fluid w-100" style="display:none;">
                        <p id="awaitingPrompt" class="text-muted">Awaiting your design prompt...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
