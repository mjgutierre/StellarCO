@extends('layouts.app')
@section('title', $viewData['title'])

@section('content')
<div class="container mt-5 orders-page">
    <h2>Ordenes</h2>
    <div class="row">
        @forelse ($viewData["orders"] as $order)
        <div class="col-md-4 d-flex align-items-stretch">
            <div class="card mb-4 shadow-sm w-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">@lang('messages.Address'): {{ $order->getAddress() }}</h5>
                    <p class="card-text">@lang('messages.Total'): ${{ number_format($order->getTotal(), 2) }}</p>
                    <p class="card-text">@lang('messages.Status'): {{ $order->getStatus() }}</p>
                    <p class="card-text">
                        @lang('messages.TrackingNumber'):
                        @if ($order->getTrackingNumber() !== '')
                        {{ $order->getTrackingNumber() }}
                        @else
                        <span class="badge rounded-pill bg-warning text-dark">@lang('messages.PendingTrakingNum')</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>

        @empty
        <div class="col-12">
            <p class="text-center text-muted">@lang('messages.noOrders')</p>
        </div>
        @endforelse
    </div>
    @endsection