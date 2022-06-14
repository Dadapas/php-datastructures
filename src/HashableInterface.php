<?php
namespace Dadapas\Ds;

interface HashableInterface
{
	/**
	 * Representative hash string
	 * 
	 * @param mixed $param key to be hashed
	 * @return string representative hash
	*/ 
	public function hash($param);
}