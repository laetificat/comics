<!doctype html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body>
    @include('layouts.header')
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

  <div class="carousel-inner">
  <?php $i = 0; ?>
  @foreach($featured as $item)
  @if($i < 1)
  <!-- Slider Content (Wrapper for slides )-->
    <div class="item active">
          <center><img src="comics/{{ $item->comics_name }}/{{ $item->comics_cover }}" width="200px" height="300px"></center>
          <div class="carousel-caption">
            <h1>{{ $item->comics_name }}</h1>
            <h3>{{ $item->comics_author }}</h3>
          </div>
    </div>
    @else
    <div class="item">
          <center><img src="comics/{{ $item->comics_name }}/{{ $item->comics_cover }}" width="200px" height="300px"></center>
          <div class="carousel-caption">
            <h1>{{ $item->comics_name }}</h1>
            <h3>{{ $item->comics_author }}</h3>
          </div>
    </div>
    @endif
    <?php $i++; ?>
  @endforeach
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
    <h1>News</h1>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">June 18, 2014</h3>
        </div>
        <div class="panel-body">
            Added comic deleting<br />
            Added base for comic editing<br />
            Added glyphon icons on the browse page with tooltips<br />
            Comics now have page numbers in the database<br />
            Added slider<br />
            Added feature functionality, featured items show up in the slider<br />
            Almost all code is in a single controller now<br />
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">June 15, 2014</h3>
        </div>
        <div class="panel-body">
            Made reading page to work on most devices<br />
            Added photoswipe for optimal reading<br />
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">June 14, 2014</h3>
        </div>
        <div class="panel-body">
            Added selecting of cover image<br />
            Added images to browsing page<br />
            Added working page numbers to browsing page<br />
            Added comic reading pages<br />
            Added comic title in navbar when reading a comic<br />
            Added images to search on upload page<br />
            Total # of comic pages for every comic are saved in database<br />
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">June 13, 2014</h3>
        </div>
        <div class="panel-body">
            Fixed menu<br />
            Added search<br />
            Added comic autofill with database backend<br />
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">June 12, 2014</h3>
        </div>
        <div class="panel-body">
            Added upload functionality<br />
        </div>
    </div>
</body>
@include('layouts.footer')
</html>
