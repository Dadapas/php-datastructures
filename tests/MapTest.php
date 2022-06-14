<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Dadapas\Ds\Map;

final class MapTest extends TestCase
{
	protected $map1;

	protected $map2;

	/**
	 * @before
	*/ 
	protected function setFirst()
	{
		$this->map1 = new Map([["key", 5], ["key", 6] ]);
		$this->map2 = new Map();
	}

	public function test_length()
	{
		$this->assertEquals(1, $this->map1->length(), "length is one");
	}

	public function test_basics()
	{
		$this->assertEquals(6, $this->map1->get("key"), "value of key is 6");
	}

	public function test_types()
	{
		$this->map2->put(6, "lalao");
		$this->map2->put("6", "geoarge");

		$this->assertEquals("lalao", $this->map2->get(6));
		$this->assertEquals("geoarge", $this->map2->get("6"));
	}
}