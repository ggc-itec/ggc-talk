<?php

class PostTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testPostRouteExample()
	{
		
		//assert;arrange
		$crawler = $this->client->request('GET', '/posts');		

		//assert
		$this->assertTrue($this->client->getResponse()->isOk());
	}

	public function testCreatePostRoute()
	{
		//assert;arrange
		$crawler = $this->client->request('GET', '/posts/add');


		//assert
		$this->assertTrue($this->client->getResponse()->isOk());
	}

	public function testPostModelValidates()
	{
		//arrange
		$post = new Posts;
		$post->title ='GGC Test Post!';
		$post->message = 'This is a fake data blah blah blah';
 		
 		//act
 		$result = $post->validate();
	    
 		//assert
	    $this->assertTrue($result);
	}

	public function testCreatePost()
	{
		//TODO:figure out how to test form submission for unit testing in Laravel
	}

	public function testStore()
	{
		$post = new Posts;
		$post->id = 123;
		$post->title ='GGC Test Post!';
		$post->temp_username ='Joe';
		$post->message = 'This is a fake data blah blah blah';
		$post->topic_id = 1651;
		$post->save();
		Posts::findOrFail($post->id);

	}
}