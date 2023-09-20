<!-- Autor del codigo Maria Jose Gutierrez Estrada -->
@extends('layouts.admin')
@section('title', 'Admin Page - StellarCO')
@section('content')
<header>
    <div class="static-image">
        <div class="overlay-content">
            <h5>@lang('messages.WelcomeAdmin')</h5>
            <p>@lang('messages.HereYouCanManageYourProducts').</p>
            <a href="{{ route('admin.product.index') }}" class="btn btn-primary">@lang('messages.StartHere')</a>
            <p class="statistics-p">@lang('messages.HereYouCanSeeYourStatistics')</p>
            <a href="{{ route('admin.statistics.index') }}" class="btn btn-primary">@lang('messages.ClickHere')</a>
        </div>
    </div>
@endsection