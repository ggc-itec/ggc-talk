<?php

class LocationTest extends TestCase {

	
	public function testLocationRoutes()
	{
		$crawler = $this->client->request('GET', '/');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

	

	public function testLocationModel()
	{

	  $location = new Location;
      $location->name = '';
      $location->longitude = '33.979700';
      $location->latitude = '-84.001750';
      $location->description = 'A challenging maze';
      $location->save();
	}

	public function testCreateRoute()
	{
		$crawler = $this->client->request('GET', '/location/create');

		$this->assertTrue($this->client->getResponse()->isOk());
	}


	public function testHandleCreateAction()
	{
		$crawler = $this->client->request('GET', '/location/create');

		$form = $crawler->selectButton('Create')->form();

		$form['name'] = 'A Building';
		$form['longitude'] = '33.979700';
		$form['latitude'] = '-84.001750';
		$form['description'] = 'A challenging maze';

		$result = $this->client->submit($form);
	}

	public function testEditAction(){
		//arrange
		$locationID = array('location' => 1);
		
		//act
		$response = $this->action('GET', 'LocationController@showMap', $locationID);
		
		//assert
		$this->assertViewHas('location');
		$this->assertTrue($this->client->getResponse()->isOk());
	}


	public function testHandleEditAction()
	{
		//TODO:finish unit test for handleEdit 
		//arrange
		//$locationID = array('location' => 1);
		
		//act
		//$response = $this->action('GET', 'LocationController@showMap', $locationID);
		
		//$form = $crawler->selectButton('Save')->form();

		//$form['id'] = '1';
		//$form['name'] = 'A Building';
		//$form['longitude'] = '33.979700';
		//$form['latitude'] = '-84.001750';
		//$form['description'] = 'A challenging maze';

		//$result = $this->client->submit($form);
	}





public function testDeleteRoute()
	{
		$crawler = $this->action('GET', 'LocationController@delete', array('location' => 1));

		$this->assertTrue($this->client->getResponse()->isOk());
	}


	public function testHandleDeleteAction()
	{
		//TODO:create handleDelete
	}



	public function testShowListRoute()
	{
		$crawler = $this->client->request('GET', '/location/showlist');
		$this->assertViewHas('locations');
		$this->assertTrue($this->client->getResponse()->isOk());
	}

	public function testShowMapRoute()
	{
		//arrange
		$locationID = array('location' => 1 );
		
		//act
		$response = $this->action('GET', 'LocationController@showMap', $locationID);
		
		//assert
		$this->assertViewHas('location');
		
	}

	

	
	public function testLocationModelValidates()
	{
		//TODO: add validation to LocationEloquentModel
	}



}