<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Dadapas\Ds\Set;

final class SetTest extends TestCase
{
	public function test_basic()
	{
		$myset = new Set(['rakoto', 3, "3"]);
		$this->assertEquals(3, $myset->length());

		// Delete rakoto key
		$myset->delete('rakoto');
		$this->assertEquals(2, $myset->length());

		$myset->add("3");
		$this->assertEquals(2, $myset->length());
	}
}