<?php

class UploadPage extends Eloquent {

    protected $fillable = array('comic_name', 'comic_image', 'comic_page');
    protected $table = 'comic_images';

}
