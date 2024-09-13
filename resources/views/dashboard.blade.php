<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <title>Login / Sign In</title>
</head>
<body>
    
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('login') ? 'active' : '' }}"
                        href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('signin') ? 'active' : '' }}"
                        href="{{ route('signin') }}">Sign In</a>
                </li>

                @if(auth()->check())
                @if(auth()->user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" href="{{ route('dashboard') }}">Admin</a>
                    </li>
                @endif
            
                <!-- Show Shop link for both admin and customer -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('shop') ? 'active' : '' }}" href="{{ route('shop') }}">Shop</a>
                </li>
            
            @endif
            </ul>
        </div>
    </div>
</nav>


<div class="container">

    <div class="container-fluid"> 
            <h1 class=" p-3">Dashboard</h1> 
    
        <div class="content p-4">
            <h2>Welcome, Admin!</h2>
            <p>This is your dashboard where you can manage the shop.</p>
    
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-center mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Total Products</h5>
                            <p class="card-text">50</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            <p class="card-text">150</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Sales Today</h5>
                            <p class="card-text">$200</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</body>
