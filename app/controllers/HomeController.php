<?php

class HomeController extends \BaseController {

    public function index()
    {
        $featured = UploadComic::where('comics_featured', '=', 1)->get();
        return View::make('frontend.index', array('featured' => $featured));
    }

}
