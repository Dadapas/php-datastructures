<?php
namespace Dadapas\Ds;

use Iterator;

class Set extends Hash implements Iterator
{
	private $arr = [];

	private $values = [];

	private $size = 0;

	private $position = 0;

	public function __construct(array $arr = [])
	{
		foreach($arr as $a)
		{
			$this->add($a);
		}
	}

	public function add($value)
	{
		if ( ! $this->has($value) )
			$this->size++;

		$this->arr[$this->hash($value)] = $value;
		$this->position = 0;
	}

	public function delete($value)
	{
		if (isset($this->arr[$this->hash($value)]))
		{
			$this->size--;
			unset($this->arr[$this->hash($value)]);
		}
		$this->position = 0;
	}

	public function has($value)
	{
		return array_key_exists($this->hash($value), $this->arr);
	}

	public function length()
	{
		return $this->size;
	}

	public function current()
	{
		return current($this->arr);
	}

	public function key()
	{
		return $this->position;
	}

	public function next()
	{
		++$this->position;
		next($this->arr);
	}

	public function rewind()
	{
		$this->position = 0;
		reset($this->arr);
	}

	public function valid()
	{
		return isset($this->arr[key($this->arr)]);
	}
}