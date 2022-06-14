<?php
namespace Dadapas\Ds;

use Iterator;

class Set implements Iterator
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

		$this->arr[$value] = $value;
		$this->position = 0;
	}

	public function delete($value)
	{
		if (isset($this->arr[$value]))
		{
			$this->size--;
			unset($this->arr[$value]);
		}
		$this->position = 0;
	}

	public function has($value)
	{
		return array_key_exists($value, $this->arr);
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