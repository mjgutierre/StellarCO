@extends('layouts.admin')
@section('title', $viewData['title'])

@section('content')
<div class="container mt-5 orders-page">
    <h2>@lang('messages.competitorMonitor')</h2>
    @if (isset($viewData['error']))
        <div class="alert alert-danger" role="alert">
            @lang('messages.error'): {{ $viewData['error'] }}
        </div>
    @else
        <div class="row">
            @foreach ($viewData['products'] as $product)
            <div class="col-md-4 d-flex align-items-stretch">
                <div class="card mb-4 shadow-sm w-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Id: {{ $product['id'] }}</h5>
                        <p class="card-title">@lang('messages.name'): {{ $product['name'] }}</p>
                        @if (isset($product['price']))
                            <p class="card-text">@lang('messages.price'): ${{ number_format($product['price'], 2) }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
