@extends('layouts.frontend')

@section('content')

<div class="container mt-5">

```
<div class="text-center mb-5">

    <h1 class="fw-bold">
        Latest Blogs
    </h1>

    <p class="text-muted">
        Read latest jobs, admit cards, results and updates
    </p>

</div>

<div class="row">

    @if($blogs->count() > 0)

        @foreach($blogs as $blog)

            <div class="col-md-4 mb-4">

                <div class="card h-100 shadow position-relative">

                    <span class="badge bg-danger position-absolute top-0 end-0 m-2">
                        Featured
                    </span>

                    @if($blog->image)

                        <img
                            src="{{ asset('storage/' . $blog->image) }}"
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

                        <div style="height:100px; overflow:hidden;" class="mt-3">

                            {!! $blog->content !!}

                        </div>

                    </div>

                    <div class="card-footer">

                        <a href="/blog/{{ $blog->id }}"
                           class="btn btn-dark w-100">

                            Read More

                        </a>

                    </div>

                </div>

            </div>

        @endforeach

    @else

        <div class="col-12">

            <div class="alert alert-info text-center">

                No blogs available right now.

            </div>

        </div>

    @endif

</div>
```

</div>

@endsection
