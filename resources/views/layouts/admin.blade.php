<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Jnujsl5+z0I5t9z5l5Ff5r5l5Ff5r5l5Ff5r5l5Ff5r5l5Ff" crossorigin="anonymous">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <title>@yield('title', 'StellarCO')</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.statistics.index') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.product.index') }}">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.product.create') }}">Crear</a>
                        </li>
                        @guest
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('register') }}">Register</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.statistics.index') }}">Estadisticas</a>
                        </li>
                        <li class="nav-item">
                            <form id="logout" action="{{ route('logout') }}" method="POST">
                                <a role="button" class="nav-link active" onclick="document.getElementById('logout').submit();">Logout</a>
                                @csrf
                            </form>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="container">
                    <div class="mt-5">
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

    <script>
        // JavaScript para mostrar/ocultar la barra lateral en dispositivos pequeños
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');

        function openSidebar() {
            sidebar.classList.add('active');
            mainContent.style.marginLeft = '250px';
        }

        function closeSidebar() {
            sidebar.classList.remove('active');
            mainContent.style.marginLeft = '0';
        }
    </script>
</body>

</html>