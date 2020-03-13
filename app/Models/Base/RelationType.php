<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class RelationType
 * 
 * @property int $idRelationType
 * @property string $prefix
 * @property string $nameEntity1
 * @property string $nameEntity2
 * @property string $nameEntity3
 * @property int $idEntity
 * @property int $idRelationGroup
 * 
 * @property \App\Models\Entity $entity
 * @property \App\Models\RelationGroup $relationGroup
 * @property Collection $entityRelation
 *
 * @package App\Models\Base
 */

class RelationType extends \MBusinessModel
{
	public int $idRelationType; 
	public string $prefix = '';
	public string $nameEntity1 = '';
	public string $nameEntity2 = '';
	public string $nameEntity3 = '';
	public int $idEntity; 
	public int $idRelationGroup; 
	public \App\Models\Entity $entity; 
	public \App\Models\RelationGroup $relationGroup; 
	public Collection $entityRelation; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function relationGroup()
	{
		return $this->relationGroup ?: $this->retrieveAssociation('relationGroup'); 
	}

	public function entityRelation()
	{
		return $this->entityRelation ?: $this->retrieveAssociation('entityRelation'); 
	}
}
