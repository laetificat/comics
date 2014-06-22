<!doctype html>
<html lang="en">
<head>
    @include('layouts.head')
    <link rel="stylesheet" href="{{ URL::to('/') }}/assets/css/photoswipe.css">
    <script type="text/javascript" src="{{ URL::to('/') }}/assets/js/simple-inheritance.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/assets/js/photoswipe.min.js"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function(){

            Code.photoSwipe('a', '#Gallery');

        }, false);
    </script>
</head>
<body>
@include('layouts.header')

@if(in_array('not found', $messages))
    <h1>Sorry, a comic with this ID is not found.</h1>
@else
<div class="row" id="Gallery">
    <?php $i = 0; ?>
    @foreach($pages as $page)
    <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 gallery-row">
        <a href="{{ URL::to('/') }}/{{ $page->comic_image }}">
            <div class="panel panel-default">
                <div class="panel-body page-container gallery-item">
                    <img src="{{ URL::to('/') }}/{{ $page->comic_image }}" width="100%" height="auto">
                </div>
                <div class="panel-footer"><center>@if($i == 0) Cover @else Page {{ $i }} @endif </center></div>
            </div>
        </a>
    </div>
    <?php $i++; ?>
    @endforeach
</div>
@endif
@include('layouts.footer')
</body>
</html>


