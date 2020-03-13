<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class RelationGroup
 * 
 * @property int $idRelationGroup
 * @property int $idEntity
 * 
 * @property \App\Models\Entity $entity
 * @property Collection $relationType
 *
 * @package App\Models\Base
 */

class RelationGroup extends \MBusinessModel
{
	public int $idRelationGroup; 
	public int $idEntity; 
	public \App\Models\Entity $entity; 
	public Collection $relationType; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function relationType()
	{
		return $this->relationType ?: $this->retrieveAssociation('relationType'); 
	}
}
