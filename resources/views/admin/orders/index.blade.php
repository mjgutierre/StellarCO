<!-- Created By Sebastian Arias -->
@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="container mt-5 orders-page">
    <h2>Ordenes</h2>
    <div class="row">
        @foreach ($viewData["orders"] as $order)
        <div class="col-md-4 d-flex align-items-stretch">
            <div class="card mb-4 shadow-sm w-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Id: {{ $order->getId() }}</h5>
                    <p class="card-title">@lang('messages.Address'): {{ $order->getAddress() }}</p>
                    <p class="card-text">@lang('messages.Total'): ${{ number_format($order->getTotal(), 2) }}</p>
                    <p class="card-text">
                        @lang('messages.Status'):
                        <span class="badge rounded-pill {{ $order->getStatus() == 'pendiente' ? 'bg-success' : 'bg-warning' }}">
                            {{ $order->getStatus() }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection