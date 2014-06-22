<!doctype html>
<html lang="en">
<head>
    @include('layouts.head')
    <link rel="stylesheet" href="assets/css/dropzone.css">
    <link rel="stylesheet" href="assets/css/dropzone.bootstrap.css">
    <link rel="stylesheet" href="assets/css/typeahead.css">
    <script src="assets/js/dropzone.js"></script>
    <script src="assets/js/typeahead.bundle.js"></script>
</head>
<body>
@include('layouts.header')
<div id="actions" class="row">

      <div class="col-lg-7">
        <!-- The fileinput-button span is used to style the file input field as button -->
        <span class="btn btn-success fileinput-button">
            <i class="glyphicon glyphicon-plus"></i>
            <span>Add files...</span>
        </span>
        <button type="submit" class="btn btn-primary start">
            <i class="glyphicon glyphicon-upload"></i>
            <span>Start upload</span>
        </button>
        <button type="reset" class="btn btn-warning cancel">
            <i class="glyphicon glyphicon-ban-circle"></i>
            <span>Cancel upload</span>
        </button>

        <input type="text" class="form-control" placeholder="Comic name" id="comic_name"></input>

      </div>

    </div>

<div class="table table-striped" class="files" id="previews">

  <div id="template" class="file-row">
    <!-- This is used as the file preview template -->
    <div>
        <span class="preview"><img data-dz-thumbnail /></span>
    </div>
    <div>
        <p class="name" data-dz-name></p>
        <strong class="error text-danger" data-dz-errormessage></strong>
    </div>
    <div>
        <p class="size" data-dz-size></p>
        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
        </div>
    </div>
    <div>
      <button class="btn btn-primary start">
          <i class="glyphicon glyphicon-upload"></i>
          <span>Start</span>
      </button>
      <button data-dz-remove class="btn btn-warning cancel">
          <i class="glyphicon glyphicon-ban-circle"></i>
          <span>Cancel</span>
      </button>
      <button data-dz-remove class="btn btn-danger delete">
        <i class="glyphicon glyphicon-trash"></i>
        <span>Delete</span>
      </button>
    </div>
  </div>
</div>
<script src="assets/js/handlebars.js"></script>
<script src="assets/js/dropzone.conf.js"></script>
<script src="assets/js/typeahead.bundle.conf.js"></script>
@include('layouts.footer')
</body>
</html>
