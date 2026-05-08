@extends('layouts.app')

@section('content')

<div class="container mt-5 mb-5" style="max-width:900px;">

    <div class="card shadow border-0">

        <div class="card-body p-4">

            <h1 class="mb-4 fw-bold">
                Create Blog
            </h1>

            @if ($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form action="/blogs" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Blog Title
                    </label>

                    <input type="text"
                           name="title"
                           class="form-control"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Category
                    </label>

                    <select name="category" class="form-select">

                        <option value="Latest Jobs">Latest Jobs</option>
                        <option value="Admit Card">Admit Card</option>
                        <option value="Results">Results</option>
                        <option value="News">News</option>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Upload Image
                    </label>

                    <input type="file"
                           name="image"
                           class="form-control"
                           required>

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Blog Content
                    </label>

                    <textarea name="content"
                              id="editor"
                              class="form-control"
                              rows="10"></textarea>

                </div>

                <button class="btn btn-success">
                    Publish Blog
                </button>

            </form>

        </div>

    </div>

</div>

<script src="https://cdn.ckeditor.com/4.25.1-lts/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('editor');
</script>

@endsection
