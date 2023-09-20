@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<button type="button" class="btn btn-primary launch" data-toggle="modal" data-target="#staticBackdrop"> <i class="fa fa-info"></i> Get information
</button>
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body ">
                <div class="text-right"> <i class="fa fa-close close" data-dismiss="modal"></i> </div>
                <div class="px-4 py-5">
                    <h5 class="text-uppercase">GET USER</h5>
                    <h4 class="mt-5 theme-color mb-5">Thanks for your order</h4>
                    <span class="theme-color">Payment Summary</span>
                    <div class="mb-3">
                        <hr class="new1">
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="font-weight-bold">GET QUANTITY Ether Chair(Qty:1)</span>
                        <span class="text-muted">GET PRICE $1750.00</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <small>Shipping</small>
                        <small>$175.00</small>
                    </div>
                    <div class="d-flex justify-content-between">
                        <small>Tax</small>
                        <small>$200.00</small>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <span class="font-weight-bold">Total</span>
                        <span class="font-weight-bold theme-color">GET PRICE  $2125.00</span>
                    </div>
                    <div class="text-center mt-5">
                        <button class="btn btn-primary">Track your order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection