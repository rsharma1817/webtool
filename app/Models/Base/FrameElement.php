<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class FrameElement
 * 
 * @property int $idFrameElement
 * @property bool $active
 * @property int $idEntity
 * @property int $idFrame
 * @property int $idCoreType
 * 
 * @property \App\Models\Entity $entity
 * @property \App\Models\Frame $frame
 * @property \App\Models\TypeInstance $typeInstance
 * @property Collection $mmObject
 *
 * @package App\Models\Base
 */

class FrameElement extends \MBusinessModel
{
	public int $idFrameElement; 
	public bool $active = false;
	public int $idEntity; 
	public int $idFrame; 
	public int $idCoreType; 
	public \App\Models\Entity $entity; 
	public \App\Models\Frame $frame; 
	public \App\Models\TypeInstance $typeInstance; 
	public Collection $mmObject; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function frame()
	{
		return $this->frame ?: $this->retrieveAssociation('frame'); 
	}

	public function typeInstance()
	{
		return $this->typeInstance ?: $this->retrieveAssociation('typeInstance'); 
	}

	public function mmObject()
	{
		return $this->mmObject ?: $this->retrieveAssociation('mmObject'); 
	}
}
