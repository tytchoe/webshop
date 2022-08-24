@if ($paginator->hasPages())
    @if ($paginator->onFirstPage())
        <li class="disabled">
            <a href="{{ $paginator->previousPageUrl() }}" ><i class="fa fa-chevron-left"></i>Previous</a>
        </li>
    @else
        <li class="disabled">
            <a href="" ><i class="fa fa-chevron-left"></i>Previous</a>
        </li>
    @endif

    @foreach ($elements as $element)

        @if (is_string($element))
            <li class="disabled"><span>{{ $element }}</span></li>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="active my-active"><span><a class="pagi-num">{{ $page }}</a></span></li>
                @else
                    <li><span><a class="pagi-num" href="{{ $url }}">{{ $page }}</a></span></li>
                @endif
            @endforeach
        @endif
    @endforeach
{{--    <li class="active">--}}
{{--        <span><a class="pagi-num" href="#">1</a></span>--}}
{{--    </li>--}}
{{--    <li>--}}
{{--        <span><a class="pagi-num" href="#">2</a></span>--}}
{{--    </li>--}}
    @if ($paginator->$paginator->hasMorePages())
        <li>
            <a href="{{ $paginator->nextPageUrl() }}" >Next<i class="fa fa-chevron-right"></i></a>
        </li>
    @else
        <li class="disabled">
            <a href="#" >Next<i class="fa fa-chevron-right"></i></a>
        </li>
    @endif

@endif
