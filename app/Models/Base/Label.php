<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class Label
 * 
 * @property int $idLabel
 * @property int $startChar
 * @property int $endChar
 * @property bool $multi
 * @property int $idLabelType
 * @property int $idLayer
 * @property int $idInstantiationType
 * 
 * @property \App\Models\Entity $entity
 * @property \App\Models\Layer $layer
 * @property \App\Models\TypeInstance $typeInstance
 *
 * @package App\Models\Base
 */

class Label extends \MBusinessModel
{
	public int $idLabel; 
	public int $startChar; 
	public int $endChar; 
	public bool $multi = false;
	public int $idLabelType; 
	public int $idLayer; 
	public int $idInstantiationType; 
	public \App\Models\Entity $entity; 
	public \App\Models\Layer $layer; 
	public \App\Models\TypeInstance $typeInstance; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function layer()
	{
		return $this->layer ?: $this->retrieveAssociation('layer'); 
	}

	public function typeInstance()
	{
		return $this->typeInstance ?: $this->retrieveAssociation('typeInstance'); 
	}
}
