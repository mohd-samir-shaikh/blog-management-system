@extends('layouts.guest')

@section('content')

<div class="container mt-5" style="max-width:500px;">

    <div class="card shadow p-4">

        <h2 class="text-center mb-4">Login</h2>

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email') }}"
                    required
                >

                @error('email')
                    <div class="text-danger mt-1">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    required
                >

                @error('password')
                    <div class="text-danger mt-1">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="form-check mb-3">

                <input
                    type="checkbox"
                    name="remember"
                    class="form-check-input"
                    id="remember"
                >

                <label class="form-check-label" for="remember">
                    Remember Me
                </label>

            </div>

            <div class="d-flex justify-content-between align-items-center">

                <a href="{{ route('password.request') }}">
                    Forgot Password?
                </a>

                <button class="btn btn-primary">
                    Login
                </button>

            </div>

        </form>

        <hr>

        <p class="text-center mb-0">

            Don't have an account?

            <a href="{{ route('register') }}">
                Register
            </a>

        </p>

    </div>

</div>

@endsection
