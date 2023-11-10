@extends('layouts.app')
@section('title', $viewData['title'])

@section('content')
<div class="row">
    @forelse ($viewData["orders"] as $order)
    <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">@lang('messages.Address'): {{ $order->getAddress() }}</h5>
                <p class="card-text">@lang('messages.Total'): {{ $order->getTotal() }}</p>
                <p class="card-text">@lang('messages.Status'): {{ $order->getStatus() }}</p>
                <p class="card-text">@lang('messages.TrackingNumber'): {{ $order->getTrackingNumber() }}</p>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <p class="text-center text-muted">@lang('messages.NoElementsInCart')</p>
    </div>
    @endforelse
</div>
@endsection
