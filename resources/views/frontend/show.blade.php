@extends('layouts.frontend')

@section('content')

<div class="container mt-5">

    <a href="/" class="btn btn-secondary mb-4">
        ← Back
    </a>

    <div class="card shadow">

        @if($blog->image)

            <img
                src="{{ asset('storage/' . $blog->image) }}"
                class="card-img-top"
                style="height:450px; object-fit:cover;"
            >

        @endif

        <div class="card-body p-5">

            <h1 class="mb-3">
                {{ $blog->title }}
            </h1>

            <p class="text-muted">

                {{ $blog->category }}

                |

                Posted on
                {{ $blog->created_at->format('d M Y') }}

            </p>

            <hr>

            <div class="mt-4">

                {!! $blog->content !!}

            </div>

        </div>

    </div>

</div>

@endsection
