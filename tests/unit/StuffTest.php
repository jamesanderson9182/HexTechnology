<?php

namespace HexTechnology\Tests\Unit;

use HexTechnology\Models\Client;
use HexTechnology\Tests\HexTechnologyTestCase;

class StuffTest extends HexTechnologyTestCase
{
	public function testAssertTrue()
	{
		$this->assertTrue(true);

		$client = new Client();
		$client->ClientDisplayName = "James";
		$client->save();

		$result = Client::findFirst();

		$this->assertTrue(($result->ClientDisplayName == "James"));
	}
}