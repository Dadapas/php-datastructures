<?php
namespace Dadapas\Ds;

class Hash implements HashableInterface
{

	public function hash($param)
	{
		return gettype($param).$param;
	}
}