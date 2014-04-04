<?php

class PostTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testPostRouteExample()
	{
		$crawler = $this->client->request('GET', '/posts');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

	public function testPostModelValidates()
	{
		$post = new Post;
		$post->title ='GGC Test Post!';
		$post->message = 'This is a fake data blah blah blah';
 		$result = $post->validate();
	    $this->assertTrue($result);
	}

}