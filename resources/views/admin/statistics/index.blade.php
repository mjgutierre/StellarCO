<!-- Autor -->
@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<div class="containerstatistics">
    <div class="breadcrumbs">
        <a href="{{ route('admin.index') }}">@lang('messages.home')</a> /
        @lang('messages.statistics')
    </div>
    <h3 class="statistics-title">@lang('messages.ThoseAreYourBussinessStatistics')</h3>
    <div class="row">
        <div class="four col-md-3">
            <div class="counter-box">
                <i class="fa fa-thumbs-o-up"></i>
                <p>@lang('messages.WeHave') {{$viewData['rockets']}} @lang('messages.rockets').</p>
            </div>
        </div>
        <div class="four col-md-3">
            <div class="counter-box">
                <i class="fa fa-group"></i>
                <p>@lang('messages.WeHave') ${{$viewData['countries']}} @lang('messages.DollarsOnRockets').</p>
            </div>
        </div>
        <div class="four col-md-3">
            <div class="counter-box">
                <i class="fa fa-shopping-cart"></i>
                <p> @lang('messages.ClientsUsuallyHave') {{$viewData['rocketsAvg']}} @lang('messages.rockets').</p>
            </div>
        </div>
        <div class="four col-md-3">
            <div class="counter-box">
                <i class="fa fa-user"></i>
                <p>@lang('messages.WeHave') {{$viewData['usersCount']}}@lang('messages.UsersOfTypeCustomer')</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="filters breadcrumbs analytics">
                <div class="btn btn-primary">
                    <a href="{{ route('admin.statistics.users') }}">@lang('messages.ListUsers')</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection