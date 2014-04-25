<?php

class Post_TopicController extends BaseController {

	/**
	 * Display a listing of topics
	 *
	 * @return Response
	 */
	public function index()
	{
		$topics = Post_topic::all();

		return View::make('topics.index', compact('topics'));
	}

	/**
	 * Show the form for creating a new topic
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('topics.create');
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
		$topic = new Post_topic;
		$topic->title = Input::get('title');
		$topic->category_id = Input::get('category_id');
		$topic->save();

		return Redirect::route('topics.index');
	}

	/**
	 * Display the specified topic.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$topic = Post_topic::findOrFail($id);

		return View::make('topics.show', compact('topic'));
	}

	/**p
	 * Show the form ic editing the specified topic.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$topic = Post_topic::find($id);

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
		$topic = Post_topic::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Post_topic::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$topic->update($data);

		return Redirect::route('topics.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Post_topic::destroy($id);

		return Redirect::route('topics.index');
	}

}