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
              <img src="{{ $viewData['product']->getImage() }}" class="img-fluid w-100" alt="{{ $viewData['product']->getName() }}">
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
            <form action="{{ route('cart.store') }}" method="POST">
              @csrf
              <input type="hidden" name="product_id" value="{{ $viewData['product']->getId() }}">
              <button type="submit" class="btn btn-primary">@lang('messages.AddToCart')</button>
            </form>
          </div>
        </div>
      </div>

      <div>
        <h3 class="review-text">@lang('messages.Reviews')</h3>
        @foreach($viewData["product"]->getReviews() as $review)
        <div class="card review-card">
          <div class="card-header">
            @lang('messages.title'): {{ $review->getTitle() }}
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">@lang('messages.description'): {{ $review->getDescription() }}</li>
          </ul>
        </div>
        @endforeach
      </div>
    </div>

    <div class="leave-comment-section">
      <h3>@lang('messages.LeaveYourReview')</h3>
      <form method="POST" action="{{ route('review.save', ['id'=> $viewData["product"]->getId()]) }}" novalidate>
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">@lang('messages.title')</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="@lang('messages.AddTitle')" required />
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">@lang('messages.description')</label>
          <textarea class="form-control" id="description" name="description" rows="3" placeholder="@lang('messages.AddDescription')" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">@lang('messages.send')</button>
      </form>
    </div>
    @endsection