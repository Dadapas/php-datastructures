<?php
namespace Dadapas\Ds\Nodes;

class LinkListNode
{
	public function __construct($data)
	{
		$this->data = $data;
		$this->next = null;
	}
}