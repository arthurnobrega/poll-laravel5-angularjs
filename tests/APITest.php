<?php

class APITest extends TestCase {

	/**
	 * Test the GET method to retrieve all polls
	 */
	public function testGetAllPolls()
	{
		$this->mock = Mockery::mock('App\Poll');
		$this->mock
			->shouldReceive('all')
			->once();

		$this->app->instance('App\Poll', $this->mock);

		$this->call('GET', '/api/polls');
		$this->assertResponseOk();
	}

	/**
	 * Test the GET method to retrieve a single poll
	 */
	public function testGetSinglePoll()
	{
		$this->mock = Mockery::mock('App\Poll');
		$this->mock
			->shouldReceive('find')
			->once();

		$this->app->instance('App\Poll', $this->mock);

		$this->call('GET', '/api/polls/1');
		$this->assertResponseOk();
	}

	/**
	 * On tearDown: execute Mockery tests
	 */
	public function tearDown()
	{
		Mockery::close();
	}

}
