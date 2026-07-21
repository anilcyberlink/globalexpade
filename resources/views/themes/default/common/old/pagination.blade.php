@if ($paginator->hasPages())
 <div class="uk-container" style="cursor:default;">
    <ul class="pagination uk-flex-center uk-margin-large-top">
    @if ($paginator->onFirstPage())
        <li class="page-item disabled" aria-disabled="true" aria-label="« Previous"><span class="page-link" aria-hidden="true">‹</span></li>
    @else
        <li class="page-item"><a class="prev page-numbers" href="{{ $paginator->previousPageUrl() }}" rel="prev"  aria-label="« Previous" style="padding:1rem;">‹</a></li>
    @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li><span class="pagination-ellipsis"><span>{{ $element }}</span></span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                         <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a href="{{ $url }}" class="page-link" style="padding:1rem;">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

    @if ($paginator->hasMorePages())
       <li class="page-item"> <a class="page-link next page-numbers" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next »" style="padding:1rem;">›</a></li>
    @else
        <li class="page-item"> <span uk-pagination-next disabled></span></li>
    @endif 
    </ul>
</div>
@endif