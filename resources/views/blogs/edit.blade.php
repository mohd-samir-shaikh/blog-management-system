@extends('layouts.frontend')

@section('content')

<div class="container mt-5 mb-5">

    <div class="row justify-content-center">

        <div class="col-md-10">

            <div class="card shadow border-0 rounded-4">

                <div class="card-header bg-dark text-white py-3 rounded-top-4">

                    <h2 class="mb-0 fw-bold">
                        Edit Blog
                    </h2>

                </div>

                <div class="card-body p-5">

                    <form
                        action="/blogs/{{ $blog->id }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >

                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Blog Title
                            </label>

                            <input
                                type="text"
                                name="title"
                                class="form-control form-control-lg"
                                value="{{ $blog->title }}"
                                placeholder="Enter blog title"
                            >

                        </div>

                        <!-- Category -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Category
                            </label>

                            <select
                                name="category"
                                class="form-select form-select-lg"
                            >

                                <option value="Latest Jobs"
                                    {{ $blog->category == 'Latest Jobs' ? 'selected' : '' }}>
                                    Latest Jobs
                                </option>

                                <option value="Admit Card"
                                    {{ $blog->category == 'Admit Card' ? 'selected' : '' }}>
                                    Admit Card
                                </option>

                                <option value="Results"
                                    {{ $blog->category == 'Results' ? 'selected' : '' }}>
                                    Results
                                </option>

                                <option value="News"
                                    {{ $blog->category == 'News' ? 'selected' : '' }}>
                                    News
                                </option>

                            </select>

                        </div>

                        <!-- Current Image -->
                        @if($blog->image)

                            <div class="mb-4">

                                <label class="form-label fw-semibold">
                                    Current Image
                                </label>

                                <br>

                                <img
                                    src="{{ asset('storage/' . $blog->image) }}"
                                    width="250"
                                    class="rounded shadow-sm border"
                                >

                            </div>

                        @endif

                        <!-- New Image -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Change Image
                            </label>

                            <input
                                type="file"
                                name="image"
                                class="form-control"
                            >

                        </div>

                        <!-- Content -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Blog Content
                            </label>

                            <textarea
                                name="content"
                                rows="12"
                                class="form-control"
                                placeholder="Enter blog content"
                            >{{ $blog->content }}</textarea>

                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-3">

                            <button class="btn btn-success px-4 py-2">

                                Update Blog

                            </button>

                            <a href="/blogs" class="btn btn-secondary px-4 py-2">

                                Cancel

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
