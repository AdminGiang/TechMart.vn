@if ($paginator->hasPages())
    <ul class="custom-pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link arrow-link arrow-left"></span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link arrow-link arrow-left" href="{{ $paginator->previousPageUrl() }}" rel="prev"></a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled">
                    <span class="page-link">{{ $element }}</span>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link arrow-link arrow-right" href="{{ $paginator->nextPageUrl() }}" rel="next"></a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link arrow-link arrow-right"></span>
            </li>
        @endif
    </ul>
@endif 