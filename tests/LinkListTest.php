<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Dadapas\Ds\LinkList;

final class LinkListTest extends TestCase
{
	protected $list;

	/**
	 * @before
	*/ 
	protected function setFirst()
	{
		$this->list = new LinkList;
		$this->empty = new LinkList;
	}

	public function test_basics()
	{
		$this->list->addLast(3);
		$this->list->addFirst(5);

		$this->empty->addLast(654);

		$this->assertSame(2, $this->list->length());
		$this->assertFalse($this->list->isEmpty(), "link list is not empty");

	}

	public function test_clear()
	{
		$this->empty->clear();
		$this->assertTrue($this->empty->isEmpty(), "empty after clearing");
	}

	public function test_indexof()
	{
		$this->assertEquals(0, $this->list->indexOf(3), "the index of 3 is 0");
	}

	public function test_remove()
	{
		$this->empty->addLast(6);
		$this->empty->addLast(7);
		$this->empty->addLast(5);
		$this->empty->addLast(10);

		$this->assertEquals(4, $this->empty->length());

		// Delete 7 and get the index of 10 in first place
		$this->empty->remove(7);
		$this->assertEquals(3, $this->empty->length());
		$this->assertEquals(2, $this->empty->indexOf(10));
		
		// 7 the bigining of the element
		$this->empty->remove(6);
		$this->assertEquals(0, $this->empty->indexOf(7));
	}
}