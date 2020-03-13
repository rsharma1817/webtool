<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class Frame
 * 
 * @property int $idFrame
 * @property bool $active
 * @property int $idEntity
 * 
 * @property \App\Models\Entity $entity
 * @property Collection $frameElement
 * @property Collection $lu
 *
 * @package App\Models\Base
 */

class Frame extends \MBusinessModel
{
	public int $idFrame; 
	public bool $active = false;
	public int $idEntity; 
	public \App\Models\Entity $entity; 
	public Collection $frameElement; 
	public Collection $lu; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function frameElement()
	{
		return $this->frameElement ?: $this->retrieveAssociation('frameElement'); 
	}

	public function lu()
	{
		return $this->lu ?: $this->retrieveAssociation('lu'); 
	}
}
