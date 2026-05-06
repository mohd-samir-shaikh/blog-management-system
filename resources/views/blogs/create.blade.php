@extends('layouts.frontend')

@section('content')
<x-app-layout>

<div class="container mt-5">

    <div class="card shadow p-4">

        <h1 class="mb-4">Add Blog</h1>
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
                    Title
                </label>

                <input type="text"
                       name="title"
                       class="form-control">

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
                    Image
                </label>

                <input type="file"
                       name="image"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Content
                </label>

                <textarea name="content"
                          id="editor"
                          class="form-control"></textarea>

            </div>

            <button class="btn btn-success">
                Save Blog
            </button>

        </form>

    </div>

</div>

<script src="https://cdn.ckeditor.com/4.25.1-lts/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('editor');
</script>

</x-app-layout>
@endsection
