<!-- Created By Sebastian Arias -->
@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="container-fluid d-flex justify-content-center indexproducts">
    <div class="row mt-5">
        @foreach ($viewData["orders"] as $order)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Id: {{ $order->getId() }}</h5>
                    <p class="card-title">@lang('messages.Address'): {{ $order->getAddress() }}</p>
                    <p class="card-text">@lang('messages.Total'): ${{ number_format($order->getTotal(), 2) }}</p>
                    <p class="card-text">@lang('messages.Status'): {{ $order->getStatus() }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
