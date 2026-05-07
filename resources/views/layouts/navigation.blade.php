<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand" href="/">
            Blog Portal
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/blogs">
                        All Blogs
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/blogs/create">
                        Create Blog
                    </a>
                </li>

            </ul>

            <div class="d-flex align-items-center text-white">

                <span class="me-3">
                    {{ Auth::user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button class="btn btn-danger btn-sm">
                        Logout
                    </button>

                </form>

            </div>

        </div>

    </div>

</nav>
