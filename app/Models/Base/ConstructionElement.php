<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class ConstructionElement
 * 
 * @property int $idConstructionElement
 * @property bool $active
 * @property bool $optional
 * @property bool $head
 * @property bool $multiple
 * @property int $idEntity
 * @property int $idConstruction
 * 
 * @property \App\Models\Entity $entity
 * @property \App\Models\Construction $construction
 *
 * @package App\Models\Base
 */

class ConstructionElement extends \MBusinessModel
{
	public int $idConstructionElement; 
	public bool $active = false;
	public bool $optional = false;
	public bool $head = false;
	public bool $multiple = false;
	public int $idEntity; 
	public int $idConstruction; 
	public \App\Models\Entity $entity; 
	public \App\Models\Construction $construction; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function construction()
	{
		return $this->construction ?: $this->retrieveAssociation('construction'); 
	}
}
