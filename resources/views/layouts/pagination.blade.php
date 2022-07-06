<ul class="pagination ">
       <!-- Previous Page Link -->
       @if ($paginator->onFirstPage())
            <li class="page-item page-prev disabled">
                <a class="page-link" href="#" tabindex="-1">Prev</a>
            </li>
        @else
        <li class="page-item page-prev">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" tabindex="-1">Prev</a>
            </li>
        @endif
											
     <!-- Pagination Elements -->
     @foreach ($elements as $element)
        <!-- "Three Dots" Separator -->
        @if (is_string($element))
            <li class="disabled page-item"><a class="page-link" href="#!">{{ $element }}</a></li>
        @endif

        <!-- Array Of Links -->
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="page-item active"><a class="page-link" href="#!">{{ $page }}</a></li>
                @else
                    <li class="page-item "><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach
    
    <!-- Next Page Link -->
    @if ($paginator->hasMorePages())
        <li class="page-item page-next">
			<a class="page-link" href="{{ $paginator->nextPageUrl() }}">Next</a>
    	</li>
        @else
        <li class="page-item page-next disabled">
			<a class="page-link" href="#!">Next</a>
    	</li>
    @endif
  </ul> 