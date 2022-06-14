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



class Hash implements HashableInterface
{

	public function hash($param)
	{
		return gettype($param).$param;
	}
}