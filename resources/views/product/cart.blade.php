@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<div class="container">
    <div class="breadcrumbs">
        <a href="{{ route('home.index') }}">@lang('messages.home')</a> /
        <a href="{{ route('product.index') }}">@lang('messages.product')</a>
        <div class="container mt-5 mb-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-8">
                    <div class="p-2">
                        <h4>Carrito</h4>
                        <div class="d-flex flex-row align-items-center pull-right"><span class="mr-1">Sort by:</span><span class="mr-1 font-weight-bold">Price</span><i class="fa fa-angle-down"></i></div>
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                        <div class="mr-1"><img class="rounded" src="{{ $viewData['product']->getImage() }}" width="70"></div>
                        <div class="d-flex flex-column align-items-center product-details"><span class="font-weight-bold">{{ $viewData["product"]->getName() }}</span>
                            <div class="d-flex flex-row product-desc">
                                <div class="color"><span class="text-grey">Color:</span><span class="font-weight-bold">&nbsp;Grey</span></div>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center qty"><i class="fa fa-minus text-danger"></i>
                            <h5 class="text-grey mt-1 mr-1 ml-1">2</h5><i class="fa fa-plus text-success"></i>
                        </div>
                        <div>
                            <h5 class="text-grey">{{ $viewData["product"]->getPrice() }}</h5>
                        </div>
                        <div class="d-flex align-items-center"><i class="fa fa-trash mb-1 text-danger"></i></div>
                    </div>
                    <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded"><input type="text" class="form-control border-0 gift-card" placeholder="discount code/gift card"><button class="btn btn-outline-warning btn-sm ml-2" type="button">Apply</button></div>
                    <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded"><button class="btn btn-warning btn-block btn-lg ml-2 pay-button" type="button">Proceed to Pay</button></div>
                </div>
            </div>
        </div>
        @endsection