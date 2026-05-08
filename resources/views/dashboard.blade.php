@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="card shadow border-0">

        <div class="card-body text-center p-5">

            <h1 class="fw-bold mb-3">
                Welcome to Dashboard
            </h1>

            <p class="text-muted mb-4">
                You are logged in successfully.
            </p>

            <a href="/blogs/create" class="btn btn-primary me-2">
                Create Blog
            </a>

            <a href="/blogs" class="btn btn-dark">
                Manage Blogs
            </a>

        </div>

    </div>

</div>

@endsection
