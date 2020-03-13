<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class C5Link
 * 
 * @property int $idLink
 * @property string $relation
 * @property int $idNodeSource
 * @property int $idNodeTarget
 * 
 * @property \App\Models\C5Node $c5Node
 *
 * @package App\Models\Base
 */

class C5Link extends \MBusinessModel
{
	public int $idLink; 
	public string $relation = '';
	public int $idNodeSource; 
	public int $idNodeTarget; 
	public \App\Models\C5Node $c5Node; 

	public function c5Node()
	{
		return $this->c5Node ?: $this->retrieveAssociation('c5Node'); 
	}
}
