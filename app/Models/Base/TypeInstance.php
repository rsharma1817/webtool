<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class TypeInstance
 * 
 * @property int $idTypeInstance
 * @property string $info
 * @property bool $flag
 * @property int $idType
 * @property int $idEntity
 * 
 * @property \App\Models\Entity $entity
 * @property \App\Models\Type $type
 * @property Collection $annotationSet
 * @property Collection $constraintType
 * @property Collection $frameElement
 * @property Collection $label
 * @property Collection $qualia
 * @property Collection $templateElement
 * @property Collection $udFeature
 * @property Collection $udRelation
 *
 * @package App\Models\Base
 */

class TypeInstance extends \MBusinessModel
{
	public int $idTypeInstance; 
	public string $info = '';
	public bool $flag = false;
	public int $idType; 
	public int $idEntity; 
	public \App\Models\Entity $entity; 
	public \App\Models\Type $type; 
	public Collection $annotationSet; 
	public Collection $constraintType; 
	public Collection $frameElement; 
	public Collection $label; 
	public Collection $qualia; 
	public Collection $templateElement; 
	public Collection $udFeature; 
	public Collection $udRelation; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function type()
	{
		return $this->type ?: $this->retrieveAssociation('type'); 
	}

	public function annotationSet()
	{
		return $this->annotationSet ?: $this->retrieveAssociation('annotationSet'); 
	}

	public function constraintType()
	{
		return $this->constraintType ?: $this->retrieveAssociation('constraintType'); 
	}

	public function frameElement()
	{
		return $this->frameElement ?: $this->retrieveAssociation('frameElement'); 
	}

	public function label()
	{
		return $this->label ?: $this->retrieveAssociation('label'); 
	}

	public function qualia()
	{
		return $this->qualia ?: $this->retrieveAssociation('qualia'); 
	}

	public function templateElement()
	{
		return $this->templateElement ?: $this->retrieveAssociation('templateElement'); 
	}

	public function udFeature()
	{
		return $this->udFeature ?: $this->retrieveAssociation('udFeature'); 
	}

	public function udRelation()
	{
		return $this->udRelation ?: $this->retrieveAssociation('udRelation'); 
	}
}
