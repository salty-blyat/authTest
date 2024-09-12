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
                </ul>
            </div>
        </div>
    </nav>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Whoops! Something went wrong.</strong>
        <br />
        <span class="block sm:inline">Please check the following errors:</span>
        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    
    <div class="container my-4"  style="display: {{ request()->is('/') ? 'block' : 'none' }}">
        @if (Auth::check())
            <h1>Hello, {{ Auth::user()->name }}!</h1> 
            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-primary">Log out</button>
            </form>
        @else
            <h1>You're not signed in yet.</h1>
           
        @endif
    </div>



    <div class="container my-4">
        <!-- Login Form -->
        <div class="card mb-4" style="display: {{ request()->is('login') ? 'block' : 'none' }}">
            <div class="card-header">Login</div>
            <form class="card-body" method="POST" action="{{ route('auth.login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required />
                    <div id="emailHelp" class="form-text">
                        We'll never share your email with anyone else.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required />
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
                    <label class="form-check-label" for="remember_me">Remember Me</label>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>

        <!-- Sign In Form --> 
        <div class="card" style="display: {{ request()->is('signin') ? 'block' : 'none' }}">
            <div class="card-header">Sign In</div>
            <form class="card-body" method="POST" action="{{ route('auth.signin') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" class="form-control" id="name" name="name" required />
                     
                </div>

                <div class="mb-3">
                    <label for="signinEmail" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="signinEmail" name="email" required />
                    <div id="emailHelp" class="form-text">
                        We'll never share your email with anyone else.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="signinPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="signinPassword" name="password" required />
                </div>
                <div class="mb-3">
                    <label for="signinConfirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="signinConfirmPassword" name="password_confirmation"
                        required />
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me" />
                    <label class="form-check-label" for="remember_me">Remember Me</label>
                </div>
                <button type="submit" class="btn btn-primary">
                    Sign In
                </button>
            </form>
        </div>
    </div>
</body>

</html>