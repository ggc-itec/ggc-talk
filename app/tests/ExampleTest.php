<?php

class ExampleTest extends TestCase {

	/**
	 *IMPORTANT! unit tests MUST end with 'Test'
	 *
	 *
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$crawler = $this->client->request('GET', '/');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

}