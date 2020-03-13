<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class Color
 * 
 * @property int $idColor
 * @property string $name
 * @property string $rgbFg
 * @property string $rgbBg
 * 
 * @property Collection $entity
 *
 * @package App\Models\Base
 */

class Color extends \MBusinessModel
{
	public int $idColor; 
	public string $name = '';
	public string $rgbFg = '';
	public string $rgbBg = '';
	public Collection $entity; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}
}
