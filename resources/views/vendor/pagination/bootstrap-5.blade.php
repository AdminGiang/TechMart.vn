@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Hiển thị phần tiếng Việt --}}
            <p class="me-3">
                {{ $paginator->lastItem() }} / {{ $paginator->total() }} sản phẩm
            </p>

            {{-- Phần nút phân trang --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li class="page-item {{ ($page == $paginator->currentPage()) ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
                @endif
            @endforeach
        </ul>
    </nav>
@endif
