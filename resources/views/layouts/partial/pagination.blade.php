<div class="p-4 w-full">
    <!-- Previous Page Link -->
    @if ($paginator->onFirstPage())
        <div class="disabled"><span>&laquo;</span></div>
    @else
        <div><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></div>
    @endif

    {{ var_dump($paginator) }}

</div>
