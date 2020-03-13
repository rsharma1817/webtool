<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class Template
 * 
 * @property int $idTemplate
 * @property bool $active
 * @property int $idEntity
 * 
 * @property \App\Models\Entity $entity
 * @property Collection $templateElement
 *
 * @package App\Models\Base
 */

class Template extends \MBusinessModel
{
	public int $idTemplate; 
	public bool $active = false;
	public int $idEntity; 
	public \App\Models\Entity $entity; 
	public Collection $templateElement; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function templateElement()
	{
		return $this->templateElement ?: $this->retrieveAssociation('templateElement'); 
	}
}
