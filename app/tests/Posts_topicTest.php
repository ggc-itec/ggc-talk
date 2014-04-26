<?php

class Posts_topicTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testPosts_topicRouteExample()
	{
		
		//assert;arrange
		$crawler = $this->client->request('GET', '/topic');		

		//assert
		$this->client->getResponse()->isOk();
	}

	public function testCreatePost_topicRoute()
	{
		//assert;arrange
		$crawler = $this->client->request('GET', '/topic/add');


		//assert
		$this->assertTrue($this->client->getResponse()->isOk());
	}


	public function testeditPost_topicRoute()
	{
		
		//TODO:
		//assert;arrange
		//$crawler = $this->client->request('GET', '/topic/edit');


		//assert
		//$this->assertTrue($this->client->getResponse()->isOk());
	}

	public function testPostModelValidates()
	{
		
		//TODO:
		//arrange
		//$post = new Posts_topic;
		//$post->title ='GGC Test Post!';
		//$post->message = 'This is a fake data blah blah blah';
 		
 		//act
 		//$result = $post->validate();
	    
 		//assert
	    //$this->assertTrue($result);
	}

	public function testCreatePost()
	{
		//TODO:figure out how to test form submission for unit testing in Laravel
	}

	public function testStore()
	{

		//TODO:
	/*
		$post = new Posts;
		$post->id = 123;
		$post->title ='GGC Test Post!';
		$post->temp_username ='Joe';
		$post->message = 'This is a fake data blah blah blah';
		$post->topic_id = 1651;
		$post->save();
		Posts::findOrFail($post->id);
		*/
	}
}