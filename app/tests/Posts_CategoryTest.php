<?php

class Posts_CategoryTest extends TestCase {


	 public static function generateModel()
   {

      $post_category = new Posts_category;    
      $post_category->title ='GGC Test Category!';
      $post_category->description = 'This is a fake data blah blah blah';
      $post_category->created_at = new DateTime;
      $post_category->updated_at = new DateTime;
      $post_category->save();
   }

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testPosts_categoryRouteExample()
	{
		
		//assert;arrange
		$crawler = $this->client->request('GET', '/category');		

		//assert
		$this->assertTrue($this->client->getResponse()->isOk());
	}

	public function testCreatePost_categoryRoute()
	{
		//assert;arrange
		$crawler = $this->client->request('GET', '/category/add');


		//assert
		$this->assertTrue($this->client->getResponse()->isOk());
	}


	public function testeditPost_categoryRoute()
	{
		//assert;arrange
		$this->generateModel();
		$crawler = $this->client->request('GET', '/category/edit/1');
		
		//assert
		$this->assertTrue($this->client->getResponse()->isOk());
	}

	public function testPostModelValidates()
	{
		
		//TODO:
		//arrange
		//$post_category = new Posts_topic;
		//$post_category->title ='GGC Test Post!';
		//$post_category->message = 'This is a fake data blah blah blah';
 		
 		//act
 		//$result = $post_category->validate();
	    
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
	
		$post_category = new Posts_category;		
		$post_category->title ='GGC Test Category!';
		$post_category->description = 'This is a fake data blah blah blah';
		$post_category->created_at = new DateTime;
		$post_category->updated_at = new DateTime;
		$post_category->save();
		Posts_category::findOrFail($post_category->id);
		
	}
}