<?php

class Posts_TopicController extends BaseController {

	/**
	 * Display a listing of topics
	 *
	 * @return Response
	 */
	public function index()
	{
		$topics = Posts_topic::all();

		return View::make('topics.index', compact('topics'));
	}

	/**
	 * Show the form for creating a new topic
	 *
	 * @return Response
	 */
	public function create()
	{
		
		$categories = Posts_category::lists('title', 'id');

		return View::make('topics.create')->with('categories', $categories);
	}

	/**
	 * Store a newly created topic in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//$validator = Validator::make($data = Input::all(), Topic::$rules);

		//if ($validator->fails())
		//{
		//	return Redirect::back()->withErrors($validator)->withInput();
		//}
		$topic = new Posts_topic;
		$topic->title = Input::get('title');
		$topic->description = Input::get('description');
		$topic->category_id = Input::get('category');
		$topic->save();
		
		return Redirect::action('Posts_TopicController@index');
	}

	/**
	 * Display the specified topic.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$topic = Posts_topic::findOrFail($id);

		return View::make('topics.show', compact('topic'));
	}

	/**
	 * Show the form ic editing the specified topic.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$topic = Posts_topic::find($id);

		return View::make('topics.edit', compact('topic'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$topic = Posts_topic::findOrFail($id);

		//$validator = Validator::make($data = Input::all(), Posts_topic::$rules);

		//if ($validator->fails())
		//{
		//	return Redirect::back()->withErrors($validator)->withInput();
		//}

		//$topic->update($data);
		$topic = new Posts_topic;
		$topic->title = Input::get('title');
		$topic->description = Input::get('description');
		$topic->category_id = Input::get('categoryID');

		$topic->save();

		return Redirect::action('Posts_TopicController@index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Posts_topic::destroy($id);

		return Redirect::route('topics.index');
	}

}