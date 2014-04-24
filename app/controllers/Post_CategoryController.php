<?php

class Post_CategoryController extends BaseController {

	/**
	 * Display a listing of categories
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = Post_category::all();

		return View::make('categories.index', compact('categories'));
	}

	/**
	 * Show the form for creating a new category
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('categories.create');
	}

	/**
	 * Store a newly created category in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//$validator = Validator::make($data = Input::all(), Post_category::$rules);
//
//		if ($validator->fails())
//		{
//			return Redirect::back()->withErrors($validator)->withInput();
//		}

//		Post_category::create($data);

		$category = new Post_category;
		$category->title = Input::get('title');
		$category->description = Input::get('description');
		$category->save();

		return Redirect::action('Post_CategoryController@index');
	}

	/**
	 * Display the specified category.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$category = Post_category::findOrFail($id);

		return View::make('categories.show', compact('category'));
	}

	/**
	 * Show the form for editing the specified category.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$category = Post_category::find($id);

		return View::make('categories.edit', compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$category = Post_category::findOrFail($id);
		
/**		$validator = Validator::make($data = Input::all(), Post_category::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
**/
	    $category->title = Input::get('title');
		$category->description = Input::get('description');
		$category->save();
		return Redirect::action('Post_CategoryController@index');
		
	}

	/**
	 * Facilitate form submission by checking button submitted.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function VerifySubmitFormAction($id)
	{
		if(Input::get('updateButton')) 
		 {
					//update($id);
		 } 
		  elseif(Input::get('deleteButton')) 
		  {
            	//destroy($id); //if register then use this method
		  		//handle delete or soft delete.
		  }		
		return Redirect::action('Post_CategoryController@index');
		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Post_category::destroy($id);

		return Redirect::action('Post_CategoryController@index');
	}

}