<!DOCTYPE html>
<html>
<head>

    <title>Blog Portal</title>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand fw-bold" href="/">
            Blog Portal
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto align-items-center gap-2">

                <li class="nav-item">

                    <a class="nav-link text-white" href="/">
                        Home
                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link text-white" href="/blogs">
                        Admin Panel
                    </a>

                </li>

                <li class="nav-item">

                    <a class="btn btn-primary" href="/blogs/create">
                        Create Blog
                    </a>

                </li>

                <li class="nav-item">

                    @auth

    <a href="/dashboard" class="btn btn-primary me-2">
        Dashboard
    </a>

    <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf

        <button type="submit" class="btn btn-danger">
            Logout
        </button>
    </form>

@endauth


@guest

    <a href="/login" class="btn btn-outline-light">
        Login
    </a>

@endguest

                </li>

            </ul>

        </div>

    </div>

</nav>

@yield('content')

<footer class="bg-dark text-white text-center py-4 mt-auto">

    <p class="mb-0">
        © 2026 Blog Portal | Developed by Mohd Samir Shaikh
    </p>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
