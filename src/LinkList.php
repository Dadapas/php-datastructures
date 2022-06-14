<?php
namespace Dadapas\Ds;

/**
 * This file is part of the dadapas/ds library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) TOVOHERY Z. Pascal <tovoherypascal@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT 
*/ 


use Dadapas\Ds\Nodes\LinkListNode;
use Iterator;

class LinkList implements Iterator
{
	protected $head;

	protected $size = 0;

	protected $position = 0;

	protected $current = null;

	public function addFirst($value)
	{
		if ($value == null) return;
		
		++$this->size;
		
		$node = new LinkListNode($value);
		if ($this->head == null)
		{
			$this->head = $node;
			return;
		}

		$current = $this->head;
		$node->next = $current;
		$this->head = $node;
	}

	public function addLast($value)
	{
		if ($value == null) return;
		
		++$this->size;

		$node = new LinkListNode($value);
		if ($this->head == null)
		{
			$this->head = $node;
			return;
		}
		$current = $this->head;

		while($current != null) {
			if ($current->next == null)
			{
				$current->next = $node;

				return;
			}

			$current = $current->next;
		}
	}

	/**
	 * Delete the value in the list
	*/ 
	public function remove($value)
	{
		if ($value === null) return;

		$current = $this->head;
		
		if ($current->data === $value)
		{
			$current = $current->next;
			$this->head = $current;
			
			--$this->size;
			return;
		}
		$last = $this->head;
		$current = $current->next;
		
		while($current != null)
		{
			if ($value === $current->data)
			{
				$next = $current->next;
				$last->next = $next;
				$current->next = null;				
				--$this->size;
				return;
			}
			
			$last = $last->next;
			$current = $current->next;
		}
	}

	public function indexOf($value)
	{
		$index = 0;
		$current = $this->head;
		var_dump($current);
		while($current != null)
		{
			if ($value === $current->data)
				return $index;

			++$index;
			$current = $current->next;
		}
		return -1;
	}

	public function getHead()
	{
		return $this->head;
	}

	public function reverse()
	{

	}

	public function length()
	{
		return $this->size;
	}

	public function clear()
	{
		$this->head = null;
		$this->size = 0;
		$this->rewind();
	}

	public function isEmpty()
	{
		return $this->size <= 0;
	}

	public function current()
	{
		return $this->current->data;
	}

	public function key()
	{
		return $this->position;
	}

	public function next()
	{
		++$this->position;
		$this->current = $this->current->next;
	}

	public function rewind()
	{
		$this->position = 0;
		$this->current = $this->head;
	}

	public function valid()
	{
		return !is_null($this->current);
	}
}