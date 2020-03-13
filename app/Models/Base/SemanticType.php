<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class SemanticType
 * 
 * @property int $idSemanticType
 * @property int $idEntity
 * 
 * @property \App\Models\Entity $entity
 *
 * @package App\Models\Base
 */

class SemanticType extends \MBusinessModel
{
	public int $idSemanticType; 
	public int $idEntity; 
	public \App\Models\Entity $entity; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}
}
