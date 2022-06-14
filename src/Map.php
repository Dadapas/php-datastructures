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


use Iterator;

class Map extends Hash implements Iterator
{
	protected $arr = [];

	protected $size = 0;

	protected $values = [];

	protected function isKeyPairValue(array $keyval)
	{
		if ( ! (count($keyval) >= 2) )
			throw new Exception("should be key pair value, [key, value]");
	}
	
	public function __construct(array $arr = [])
	{
		foreach($arr as $value)
		{
			$this->isKeyPairValue($value);
			$this->put($value[0], $value[1]);
		}
	}

	public function put($key, $value)
	{
		if ( ! array_key_exists($this->hash($key) , $this->arr) )
			$this->size++;

		$this->arr[$this->hash($key)] = $value;
	}

	public function delete($key)
	{
		if (isset($this->arr[$this->hash($key)]))
		{
			$this->size--;
			unset($this->arr[$this->hash($key)]);
		}
		$this->position = 0;
	}

	public function has($key)
	{
		return array_key_exists($this->hash($key), $this->arr);
	}

	public function get($key, $default = null)
	{
		if ( ! $this->has($key))
			return $default;

		return $this->arr[$this->hash($key)];
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
		return key($this->arr);
	}

	public function next()
	{
		next($this->arr);
	}

	public function rewind()
	{
		reset($this->arr);
	}

	public function valid()
	{
		return isset($this->arr[$this->key()]);
	}
}