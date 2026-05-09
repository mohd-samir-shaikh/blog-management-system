@php
use Illuminate\Support\Str;
@endphp

@extends('layouts.frontend')

@section('content')

<div class="container mt-5">

```
<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>All Blogs</h2>

    <a href="/blogs/create" class="btn btn-primary">
        Add Blog
    </a>

</div>

<form action="/blogs" method="GET" class="mb-3">

    <div class="input-group">

        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Search blogs..."
            value="{{ request('search') }}"
        >

        <button class="btn btn-dark">
            Search
        </button>

    </div>

</form>

<form action="/blogs" method="GET" class="mb-4">

    <select
        name="category"
        id="categoryFilter"
        class="form-select"
    >

        <option value="">
            All Categories
        </option>

        <option value="Latest Jobs">
            Latest Jobs
        </option>

        <option value="Admit Card">
            Admit Card
        </option>

        <option value="Results">
            Results
        </option>

        <option value="News">
            News
        </option>

    </select>

</form>

<div class="row" id="blogData">

    @if($blogs->count() > 0)

        @foreach($blogs as $blog)

            <div class="col-md-4 mb-4">

                <div class="card h-100 shadow">

                    @if($blog->image)

                        <img
                            src="{{ asset($blog->image) }}"
                            class="card-img-top"
                            style="height:220px; object-fit:cover;"
                        >

                    @endif

                    <div class="card-body">

                        <h4>
                            {{ $blog->title }}
                        </h4>

                        <p class="text-muted mb-1">
                            {{ $blog->category }}
                        </p>

                        <small class="text-secondary">
                            Posted on {{ $blog->created_at->format('d M Y') }}
                        </small>

                        <div class="mt-3">

                            {!! Str::limit(strip_tags($blog->content), 100) !!}

                        </div>

                    </div>

                    <div class="card-footer d-flex gap-2">

                        <a href="/blogs/{{ $blog->id }}/edit"
                           class="btn btn-warning">

                            Edit

                        </a>

                        <form
                            action="/blogs/{{ $blog->id }}"
                            method="POST"
                        >

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger">
                                Delete
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @endforeach

    @else

        <div class="col-12">

            <div class="alert alert-info text-center">

                No blogs found.

            </div>

        </div>

    @endif

</div>

<div class="mt-4">

    <div class="d-flex justify-content-center mt-4 mb-5">
        {{ $blogs->onEachSide(1)->links('pagination::bootstrap-5') }}
    </div>

</div>
```

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>

$(document).ready(function () {

    $('#categoryFilter').change(function () {

        let category = $(this).val();

        $.ajax({

            url: '/blogs',

            type: 'GET',

            data: {
                category: category
            },

            success: function (response) {

                let html = $(response).find('#blogData').html();

                $('#blogData').html(html);

            }

        });

    });

});

</script>

@endsection
