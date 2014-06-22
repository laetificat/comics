<!doctype html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body>
    @include('layouts.header')
    <ul class="list-group">
    @foreach($comics as $comic)
            <li class="list-group-item">
                <a href="/read/{{ $comic->id }}">
                    <img src="comics/{{ $comic->comics_name }}/{{ $comic->comics_cover }}" width="160px" height="240"> {{ $comic->comics_name }}
                </a>
                <span class="badge">
                @if($comic->comics_pages == 1)
                    {{ $comic->comics_pages }} page
                @else
                    {{ $comic->comics_pages }} pages
                @endif
                 |
                <a href="edit/{{ $comic->id }}" rel="tooltip" class="tip" data-placement="bottom" title="Edit comic"><span class="glyphicon glyphicon-pencil"></span></a> |
                <a href="report/{{ $comic->id }}" rel="tooltip" class="tip" data-placement="bottom" title="Report comic"><span class="glyphicon glyphicon-flag"></span></a> |
                @if($comic->comics_featured == 1)
                    <a href="feature/{{ $comic->id }}" rel="tooltip" class="tip" data-placement="bottom" title="Un-feature comic"><span class="glyphicon glyphicon-star"></span></a> |
                @else
                    <a href="feature/{{ $comic->id }}" rel="tooltip" class="tip" data-placement="bottom" title="Feature comic"><span class="glyphicon glyphicon-star-empty"></span></a> |
                @endif
                <a href="delete/{{ $comic->id }}" rel="tooltip" class="tip" data-placement="bottom" title="Delete comic"><span class="glyphicon glyphicon-remove"></span></a>
                </span>
            </li>
    @endforeach
    </ul>
</body>
@include('layouts.footer')
</html>
