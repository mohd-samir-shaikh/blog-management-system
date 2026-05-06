@if ($paginator->hasPages())

    <nav class="d-flex justify-content-center mt-4">

        <div class="d-flex flex-column align-items-center">

            <div>
                <ul class="pagination">

                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())

                        <li class="page-item disabled">

                            <span class="page-link">
                                Previous
                            </span>

                        </li>

                    @else

                        <li class="page-item">

                            <a class="page-link"
                               href="{{ $paginator->previousPageUrl() }}"
                               rel="prev">

                                Previous

                            </a>

                        </li>

                    @endif

                    {{-- Pagination Numbers --}}
                    @foreach ($elements as $element)

                        {{-- Dots --}}
                        @if (is_string($element))

                            <li class="page-item disabled">

                                <span class="page-link">
                                    {{ $element }}
                                </span>

                            </li>

                        @endif

                        {{-- Page Links --}}
                        @if (is_array($element))

                            @foreach ($element as $page => $url)

                                @if ($page == $paginator->currentPage())

                                    <li class="page-item active">

                                        <span class="page-link">
                                            {{ $page }}
                                        </span>

                                    </li>

                                @else

                                    <li class="page-item">

                                        <a class="page-link"
                                           href="{{ $url }}">

                                            {{ $page }}

                                        </a>

                                    </li>

                                @endif

                            @endforeach

                        @endif

                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())

                        <li class="page-item">

                            <a class="page-link"
                               href="{{ $paginator->nextPageUrl() }}"
                               rel="next">

                                Next

                            </a>

                        </li>

                    @else

                        <li class="page-item disabled">

                            <span class="page-link">
                                Next
                            </span>

                        </li>

                    @endif

                </ul>
            </div>

            <div class="small text-muted mt-2">

                Showing

                <span class="fw-semibold">
                    {{ $paginator->firstItem() }}
                </span>

                to

                <span class="fw-semibold">
                    {{ $paginator->lastItem() }}
                </span>

                of

                <span class="fw-semibold">
                    {{ $paginator->total() }}
                </span>

                results

            </div>

        </div>

    </nav>

@endif
