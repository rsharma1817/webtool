<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class ConstraintInstance
 * 
 * @property int $idConstraintInstance
 * @property int $idConstraint
 * @property int $idConstrained
 * @property int $idConstrainedBy
 * @property int $idConstraintType
 * 
 * @property \App\Models\ConstraintType $constraintType
 * @property \App\Models\Entity $entity
 *
 * @package App\Models\Base
 */

class ConstraintInstance extends \MBusinessModel
{
	public int $idConstraintInstance; 
	public int $idConstraint; 
	public int $idConstrained; 
	public int $idConstrainedBy; 
	public int $idConstraintType; 
	public \App\Models\ConstraintType $constraintType; 
	public \App\Models\Entity $entity; 

	public function constraintType()
	{
		return $this->constraintType ?: $this->retrieveAssociation('constraintType'); 
	}

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}
}
