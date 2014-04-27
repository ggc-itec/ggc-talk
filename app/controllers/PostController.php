<?php

class PostController extends BaseController {

	/**
	 * Display a listing of postst_topic
	 *
	 * @return Response
	 */
	public function index()
	{
	    $posts = Posts::orderBy('created_at', 'DESC')->get();
		
	    return View::make('posts.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new post
	 *
	 * @return Response
	 */
	public function create()
	{        
        $post = Posts_topic::lists('title', 'id');  

        return View::make('posts.create', compact('post'));
	}


	/**
	 * Store a newly created post in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	    //$validator = Validator::make($data = Input::all(), Posts::$rules);

	  //  if ($validator->fails())
	  //  {
	  //      return Redirect::back()->withErrors($validator)->withInput();
	  //  }
	
	    $post = new Posts();	    
	    $post->topic_id = Input::get('topic');
		$post->temp_username = Input::get('temp_username');
		$post->title = 'test';
		$post->message = Input::get('message');	    
	    $post->save();
	    
	    return Redirect::action('PostController@index');
	}

	/**
	 * Display the specified post.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	    $post = Posts::findOrFail($id);
    	
	    return View::make('posts.show', compact('post'));
	}


	/**
	 * Show the form for editing the specified post.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Posts::find($id);

		return View::make('posts.edit', compact('post'));
	}


	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$post = Posts::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Posts::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

		$post->update($data);

		return Redirect::route('posts.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Posts::destroy($id);

		return Redirect::route('posts.index');
	}
}
