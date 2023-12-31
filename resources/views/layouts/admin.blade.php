<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="/images/logo.svg" type="image/svg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Jnujsl5+z0I5t9z5l5Ff5r5l5Ff5r5l5Ff5r5l5Ff5r5l5Ff" crossorigin="anonymous">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>@yield('title', 'StellarCO')</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.statistics.index') }}">@lang('messages.home')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.product.index') }}">@lang('messages.Products')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.product.create') }}">@lang('messages.create')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.statistics.index') }}">@lang('messages.statistic')</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('admin.users.index') }}">@lang('messages.users')</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('admin.orders.index') }}">@lang('messages.orders')</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('admin.competitorMonitor.index') }}">@lang('messages.competitorMonitor')</a>
                        </li>
                        <li class="nav-item">
                            <form id="logout" action="{{ route('logout') }}" method="POST">
                                <a role="button" class="nav-link active" onclick="document.getElementById('logout').submit();">@lang('messages.logout')</a>
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="mt-auto p-3 w-100">
                    <div class="nav-item text-center w-100">
                        <a class="nav-link d-inline mx-2" href="{{ url('language/en') }}">En</a>
                        <a class="nav-link d-inline mx-2" href="{{ url('language/es') }}">Es</a>
                    </div>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="container">
                    <div class="mt-7">
                        @if($errors->any())
                        <div class="col-12">
                            @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                            @endforeach
                        </div>
                        @endif

                        @if(session()->has('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                        @endif

                        @if(session()->has('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                    </div>
                    <div class="container my-5 content-container">
                        <div class="overlay"></div>
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    </div>

    
</body>
<script src="{{ asset('js/main.js') }}"></script>
</html>