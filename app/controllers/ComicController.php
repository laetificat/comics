<?php

class ComicController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $comics = Browse::all();

        return View::make('frontend.browse', array('comics' => $comics));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(Request::isMethod('post'))
		{
			$file = Input::file('file');
			$comic_name = Input::get('comic_name');
			$comic_cover = Input::get('comic_cover');
			$comic_page = Input::get('comic_page');
			$comic_author = 'Some author';

			$destinationPath = 'comics/' . $comic_name;
			$filename = $file->getClientOriginalName();
			$upload_success = Input::file('file')->move($destinationPath, $filename);

			if( $upload_success ) {
				$comic = UploadComic::firstOrCreate(array('comics_name' => $comic_name, 'comics_author' => $comic_author, 'comics_cover' => $comic_cover));
				$comic->increment('comics_pages');
				$comicPage = UploadPage::firstOrCreate(array('comic_name' => $comic_name, 'comic_image' => 'comics/' . $comic_name . '/' . $filename, 'comic_page' => $comic_page));
				return Response::json('success', 200);
			} else {
				return Response::json('error', 400);
			}
		} else {
			return View::make('frontend.upload');
		}


		// $comic_name = Input::get('comic_name');
		// $file = Input::file('image');
		// if(!isset($comic_name) || $comic_name == "" || !isset($file))
		// {
		// 	return "Please fill in all the fields.";
		// } else {
		// 	$destinationPath = public_path() . '/comics/' . $comic_name;
		// 	$filename = $file->getClientOriginalName();
		// 	Input::file('image')->move($destinationPath, $filename);

		// 	// $comic = new Upload;
		// 	// $comic->uploadImage()->comic_name = $comic_name;
		// 	// $comic->uploadImage()->comic_image = 'comics/' . $comic_name . '/' . $filename;
		// 	// $comic->uploadImage()->save();

		// 	$comicPage = UploadPage::firstOrCreate(array('comic_name' => $comic_name, 'comic_image' => 'comics/' . $comic_name . '/' . $filename));
		// 	$comic = UploadComic::firstOrCreate(array('comics_name' => $comic_name, 'comics_author' => $comic_author, 'comics_cover' => $comic_cover));

		// 	if (file_exists($destinationPath . '/' . $filename) == true)
		// 	{
		// 		return "file uploaded: <a href=\"http://{$destinationPath}/{$filename}\">Click here to view</a>";
		// 	}
		// }

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        try
        {
            $comic = Browse::findOrFail($id);

            $comicName = $comic->comics_name;
            $pages = ComicPage::where('comic_name', '=', $comicName)->get();
            return View::make('frontend.read', array('pages' => $pages, 'messages' => array('success')));
        }
        catch(ModelNotFoundException $e)
        {
            return View::make('frontend.read', array('messages' => array('not found')));
        }
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$comic = Browse::findOrFail($id);

        $comicName = $comic->comics_name;
        $pages = ComicPage::where('comic_name', '=', $comicName)->get();
		return View::make('frontend.edit', array('pages' => $pages, 'messages' => array('OK')));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if(Request::isMethod('post'))
		{

		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$getName = Browse::findOrFail($id);
		$comic_name = $getName->comics_name;
		UploadComic::where('comics_name', '=', $comic_name)->delete();
		UploadPage::where('comic_name', '=', $comic_name)->delete();
		$directory = $comic_name;
		$deleteFolder = File::deleteDirectory('comics/' . $directory);

		if($deleteFolder)
		{
			return Redirect::to('browse')->with('success', 'Successfully deleted "' . $comic_name . '"');
		}
	}

    public function search($query)
    {
        $results = Browse::where("comics_name", "LIKE", "%".$query."%")->take(10)->get();
        $comicsList = array();
        $i = 0;
        foreach($results as $result)
        {
            $comicsList[$i]["comic"] = $result->comics_name;
            $comicsList[$i]["cover"] = $result->comics_cover;
            $i++;
        }
        return json_encode($comicsList);
    }

    public function feature($id)
    {
    	$setFeatured = UploadComic::find($id);
    	$comic_name = $setFeatured->comics_name;
    	if($setFeatured->comics_featured == 0)
    	{
    		$setFeatured->comics_featured = 1;
    		$setFeatured->save();
    		return Redirect::to('browse')->with('success', 'Successfully featured "' . $comic_name . '"');
    	} else {
    		$setFeatured->comics_featured = 0;
    		$setFeatured->save();
    		return Redirect::to('browse')->with('success', 'Successfully un-featured "' . $comic_name . '"');
    	}
    }

    public function report($id)
    {
    	return "reporting doesn't work yet, ID: $id";
    }

}
