<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Comics</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/">Home</a></li>
        <li><a href="{{URL::to('/')}}/upload">Upload</a></li>
        <li><a href="{{URL::to('/')}}/browse">Browse</a></li>
        <li><a href="{{URL::to('/')}}/search">Search</a></li>
      </ul>
      <?php
        if(isset($pages))
        {
          if(Request::is('read/*'))
          {
            echo "<p class=\"navbar-text navbar-right\">Now reading: {$pages["0"]["comic_name"]} </p>";
          } else if(Request::is('edit/*')) {
            echo "<p class=\"navbar-text navbar-right\">Now editing: {$pages["0"]["comic_name"]} </p>";
          }
        }
      ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php
  if(Session::has('success'))
  {
    echo "<div class=\"alert alert-success alert-dismissable\">";
    echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
    echo Session::get('success');
    echo "</div>";
  }
?>
