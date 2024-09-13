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
                        <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}"
                            href="{{ route('dashboard') }}">Admin</a>
                    </li>
                    @endif

                    <!-- Show Shop link for both admin and customer -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('shop') ? 'active' : '' }}"
                            href="{{ route('shop') }}">Shop</a>
                    </li>

                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Welcome to the Shop</h1>

        <div class="row">
            <!-- Product Card 1 -->
            <div class="col-md-4">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title">Product 1</h5>
                        <p class="card-text">$19.99</p>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>

            <!-- Product Card 2 -->
            <div class="col-md-4">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product 2">
                    <div class="card-body">
                        <h5 class="card-title">Product 2</h5>
                        <p class="card-text">$29.99</p>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>

            <!-- Product Card 3 -->
            <div class="col-md-4">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product 3">
                    <div class="card-body">
                        <h5 class="card-title">Product 3</h5>
                        <p class="card-text">$39.99</p>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center mt-5 mb-3">
        <p>&copy; 2024 Your Shop Name</p>
    </footer>



</body>

</html>