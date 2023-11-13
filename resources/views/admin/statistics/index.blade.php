@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="containerstatistics">
    <h3 class="statistics-title">@lang('messages.ThoseAreYourBussinessStatistics')</h3>
    <div class="row">
        <div class="four col-md-3">
            <div class="counter-box">
                <i class="fa fa-thumbs-o-up"></i>
                <p>@lang('messages.WeHave') {{$viewData['totalInventory']}} @lang('messages.rockets').</p>
            </div>
        </div>
        <div class="four col-md-3">
            <div class="counter-box">
                <i class="fa fa-group"></i>
                <p>@lang('messages.WeHave') ${{ number_format($viewData['totalValueOfInventory'], 2) }} @lang('messages.DollarsOnRockets').</p>
            </div>
        </div>
        <div class="four col-md-3">
            <div class="counter-box">
                <i class="fa fa-shopping-cart"></i>
                <p> @lang('messages.ClientsUsuallyHave') {{$viewData['averageQuantity']}} @lang('messages.rockets').</p>
            </div>
        </div>
        <div class="four col-md-3">
            <div class="counter-box">
                <i class="fa fa-user"></i>
                <p>@lang('messages.WeHave') {{$viewData['usersCount']}} @lang('messages.UsersOfTypeCustomer')</p>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="section-title">
                <h3>@lang('messages.Products')</h3>
            </div>
            <div class="product-buttons">
                <a href="{{ route('admin.product.create') }}" class="btn btn-primary">@lang('messages.create')</a>
                <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">@lang('messages.list')</a>
            </div>
        </div>
        <div class="col-md-6">
          <div class="user-container">
              <h3>@lang('messages.users')</h3>
              @foreach($viewData['usersPreview'] as $user)
                  <p class="user-item">{{ $user->getId() }} - {{ $user->getName() }}/ {{ $user->getEmail() }}</p>
              @endforeach
              <div>
                  <div class="filters breadcrumbs analytics">
                      <div class="btn btn-primary">
                          <a href="{{ route('admin.users.index') }}">@lang('messages.ListUsers')</a>
                      </div>
                  </div>
              </div>
            </div>
          </div>
    </div>
</div>
</div>
@endsection