<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class ConstraintType
 * 
 * @property int $idConstraintType
 * @property string $prefix
 * @property string $typeEntity1
 * @property string $typeEntity2
 * @property int $idTypeInstance
 * @property int $idEntity
 * 
 * @property \App\Models\Entity $entity
 * @property \App\Models\TypeInstance $typeInstance
 * @property Collection $constraintInstance
 *
 * @package App\Models\Base
 */

class ConstraintType extends \MBusinessModel
{
	public int $idConstraintType; 
	public string $prefix = '';
	public string $typeEntity1 = '';
	public string $typeEntity2 = '';
	public int $idTypeInstance; 
	public int $idEntity; 
	public \App\Models\Entity $entity; 
	public \App\Models\TypeInstance $typeInstance; 
	public Collection $constraintInstance; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function typeInstance()
	{
		return $this->typeInstance ?: $this->retrieveAssociation('typeInstance'); 
	}

	public function constraintInstance()
	{
		return $this->constraintInstance ?: $this->retrieveAssociation('constraintInstance'); 
	}
}
