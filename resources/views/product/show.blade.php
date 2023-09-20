@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<div class="container">
    <div class="breadcrumbs">
        <a href="{{ route('home.index') }}">@lang('messages.home')</a> /
        <a href="{{ route('product.index') }}">@lang('messages.product')</a> /
        {{ $viewData["product"]->getName() }} 
    </div>
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ $viewData['product']->getImage() }}" alt="{{ $viewData['product']->getName() }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-details">
                        <h2 class="product-title">{{ $viewData["product"]->getName() }}</h2>
                        <p class="product-price"> @lang('messages.price'): ${{ $viewData["product"]->getPrice() }}</p>
                        <p class="product-quantity">@lang('messages.quantity'): {{ $viewData["product"]->getQuantity() }}</p>
                        <p class="product-location">@lang('messages.location'): {{ $viewData["product"]->getLocation() }}</p>
                        <p class="product-description">@lang('messages.description'): {{ $viewData["product"]->getDescription() }}</p>
                        <button class="btn btn-primary">@lang('messages.AddToCart')</button><!-- si esta registrado -->
                    </div>
                </div>
            </div>
            
            @foreach($viewData["product"]->getReviews() as $review) 
                    <div class="review">
                        <h5 class="product-title">{{ $review->getTitle() }}</h5><br/>
                        <p>{{ $review->getDescription() }}</p><br/>
                    </div>
            @endforeach
        </div>
        <div class="container">
          <h3>@lang('messages.LeaveYourReview')</h3>
          <form method="POST" action="{{ route('review.save', ['id'=> $viewData["product"]->getId()]) }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">@lang('messages.title')</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="@lang('messages.AddTitle')" required />
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">@lang('messages.description')</label>
              <input type="text" class="form-control" id="description" name="description" placeholder="@lang('messages.AddDescription')" required />
            </div>
            <button type="submit" class="btn btn-primary">@lang('messages.send')</button>
        </form>
        </div>
@endsection