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
		$topic = new Posts_topic;
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
		$topic = Posts_topic::findOrFail($id);

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

		$validator = Validator::make($data = Input::all(), Posts_topic::$rules);

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
		Posts_topic::destroy($id);

		return Redirect::route('topics.index');
	}

}