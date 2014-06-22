<!doctype html>
<html lang="en">
<head>
    <!-- <script src="{{ URL::to('/') }}/assets/js/sortable.min.js"></script> -->
    @include('layouts.head')
</head>
<body>
@include('layouts.header')

@if(in_array('not found', $messages))
    <h1>Sorry, a comic with this ID is not found.</h1>
@else
<!-- <div class="row" id="container"> -->
<input type="text" class="form-control" placeholder="{{ $pages[0]->comic_name }}" id="comic_name"></input>
<table class="table">
    <tbody>
    <?php $i = 0; ?>
    @foreach($pages as $page)
    <tr>
        <td><img src="{{ URL::to('/') }}/{{ $page->comic_image }}" width="120px" height="auto"></td>
        <td><input type="text" class="form-control" placeholder="{{ $page->comic_page }}" id="comic_name"></input></td>
        <td><button type="button" class="btn btn-danger">Delete</button></td>
    </tr>



<!--     <div class="col-xs-4 col-sm-3 col-md-2 col-lg-1 sortable-item">
        <div class="panel panel-default">
            <div class="panel-body page-container gallery-item">
                <img src="{{ URL::to('/') }}/{{ $page->comic_image }}" width="100%" height="auto">
            </div>
            <div class="panel-footer"><center>@if($i == 0) Cover @else Page <input type="text" value="{{ $i }}"></input> @endif </center></div>
        </div>
    </div> -->
    <?php $i++; ?>
    @endforeach
<!-- </div> -->
</tbody>
</table>
<button type="button" class="btn btn-success" id="save">Save</button>
<button type="button" class="btn btn-primary">Cancel</button>
@endif
<script type="text/javascript">
    $("#save").click(function(){
        alert("hi");
    });
</script>
<!-- <script type="text/javascript">
var container = document.getElementById("container");
var pages = <?php echo $pages; ?>;
var pagesArray = [];
var page = 0;
$.each(pages, function(key, value){
    pagesArray[value.id] = page;
    page++;
});
console.log(pagesArray);
var sort = new Sortable(container, {
    handle: ".sortable-item",
    draggable: ".sortable-item",
    onUpdate: function(evt) {
        var item = evt.item;

        console.log(pages);
    }
});
</script> -->
@include('layouts.footer')
</body>
</html>
