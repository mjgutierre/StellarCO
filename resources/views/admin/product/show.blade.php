@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="container">
    <div class="breadcrumbs">
        <a href="{{ route('admin.statistics.index') }}">@lang('messages.home')</a> /
        <a href="{{ route('admin.product.index') }}">@lang('messages.product')</a> /
        {{ $viewData["product"]->getName() }} 
    </div>
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                  <div class="product-card-admin">
                    <div class="product-image">
                      <img src="{{ $viewData['product']->getImage() }}" class="product-img" alt="{{ $viewData['product']->getName() }}">
                    </div>
                  </div>
                  <div>
                    <h3 class="review-text" >@lang('messages.Reviews')</h3>
                    @foreach($viewData["product"]->getReviews() as $review)
                      <div class="review">
                        <p>@lang('messages.title'): {{ $review->getTitle() }}</p>
                        <p>@lang('messages.description'): {{ $review->getDescription() }}</p>
                        <form method="POST" action="{{ route('admin.review.destroy', $review->getId()) }}">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">@lang('messages.delete')</button>
                        </form>
                        <br/>
                      </div>
                    @endforeach
                  </div>
                </div>
                <div class="col-md-5">
                    <form action="{{ route('admin.product.update', $viewData['product']->getId()) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <h2>@lang('messages.UpdateProduct')</h2>
                        <div class="mb-2">
                            <label for="name" class="form-label">@lang('messages.name')</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $viewData['product']->getName() }}" required>
                        </div>
                        <div class="mb-2">
                            <label for="description" class="form-label">@lang('messages.description'):</label>
                            <input type="text" name="description" id="description" class="form-control" value="{{ $viewData['product']->getDescription() }}" required>
                          </div>
                        <div class="mb-2">
                            <label for="price" class="form-label">@lang('messages.price'):</label>
                            <input type="number" name="price" id="price" class="form-control" value="{{ $viewData['product']->getPrice() }}" required>
                        </div>
                        <div class="mb-2">
                            <label for="quantity" class="form-label">@lang('messages.quantity'):</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $viewData['product']->getQuantity() }}" required>
                        </div>
                        <div class="mb-2">
                            <label for="location" class="form-label">@lang('messages.location'):</label>
                            <input type="text" name="location" id="location" class="form-control" value="{{ $viewData['product']->getLocation() }}" required>
                        </div>
                        <div class="button-group">
                            <button type="submit" class="btn btn-primary">@lang('messages.update')</button>
                    </form>
                    <form action="{{ route('admin.product.destroy', $viewData['product']->getId()) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-danger">@lang('messages.delete')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
