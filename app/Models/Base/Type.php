<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class Type
 * 
 * @property int $idType
 * @property string $type
 * @property int $idEntity
 * 
 * @property \App\Models\Entity $entity
 * @property Collection $typeInstance
 *
 * @package App\Models\Base
 */

class Type extends \MBusinessModel
{
	public int $idType; 
	public string $type = '';
	public int $idEntity; 
	public \App\Models\Entity $entity; 
	public Collection $typeInstance; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function typeInstance()
	{
		return $this->typeInstance ?: $this->retrieveAssociation('typeInstance'); 
	}
}
