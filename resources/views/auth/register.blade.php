@extends('layouts.guest')

@section('content')

<div class="container mt-5" style="max-width:500px;">

    <div class="card shadow p-4">

        <h2 class="text-center mb-4">Register</h2>

        <form method="POST" action="{{ route('register') }}">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Name
                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name') }}"
                    required
                >

                @error('name')
                    <div class="text-danger mt-1">
                        {{ $message }}
                    </div>
                @enderror

            </div>

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

            <div class="mb-3">

                <label class="form-label">
                    Confirm Password
                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="form-control"
                    required
                >

            </div>

            <div class="d-flex justify-content-between align-items-center">

                <a href="{{ route('login') }}">
                    Already registered?
                </a>

                <button class="btn btn-success">
                    Register
                </button>

            </div>

        </form>

    </div>

</div>

@endsection
