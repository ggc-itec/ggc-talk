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
		$crawler = $this->client->request('GET', '/posts/addPost');


		//assert
		$this->assertTrue($this->client->getResponse()->isOk());
	}

	public function testPostModelValidates()
	{
		//arrange
		$post = new Post;
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
		$post = new Post;
		$post->title ='GGC Test Post!';
		$post->message = 'This is a fake data blah blah blah';
		$post->save();
		Post::findOrFail($post->id);

	}
}