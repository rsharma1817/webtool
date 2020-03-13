<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class EntityRelation
 * 
 * @property int $idEntityRelation
 * @property int $idEntity1
 * @property int $idEntity2
 * @property int $idEntity3
 * @property int $idRelationType
 * 
 * @property \App\Models\Entity $entity
 * @property \App\Models\RelationType $relationType
 *
 * @package App\Models\Base
 */

class EntityRelation extends \MBusinessModel
{
	public int $idEntityRelation; 
	public int $idEntity1; 
	public int $idEntity2; 
	public int $idEntity3; 
	public int $idRelationType; 
	public \App\Models\Entity $entity; 
	public \App\Models\RelationType $relationType; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function relationType()
	{
		return $this->relationType ?: $this->retrieveAssociation('relationType'); 
	}
}
