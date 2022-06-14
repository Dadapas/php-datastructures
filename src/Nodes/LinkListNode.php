<?php
namespace Dadapas\Ds\Nodes;

/**
 * This file is part of the dadapas/ds library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) TOVOHERY Z. Pascal <tovoherypascal@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT 
*/ 

class LinkListNode
{
	public function __construct($data)
	{
		$this->data = $data;
		$this->next = null;
	}
}