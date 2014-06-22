<?php

class UploadComic extends Eloquent {

    protected $fillable = array('comics_name', 'comics_author', 'comics_cover', 'comics_pages', 'comics_featured');
    protected $table = 'comics';

}
