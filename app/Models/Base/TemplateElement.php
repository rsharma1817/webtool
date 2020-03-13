<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class TemplateElement
 * 
 * @property int $idTemplateElement
 * @property bool $active
 * @property int $idTemplate
 * @property int $idEntity
 * @property int $idCoreType
 * 
 * @property \App\Models\Entity $entity
 * @property \App\Models\Template $template
 * @property \App\Models\TypeInstance $typeInstance
 *
 * @package App\Models\Base
 */

class TemplateElement extends \MBusinessModel
{
	public int $idTemplateElement; 
	public bool $active = false;
	public int $idTemplate; 
	public int $idEntity; 
	public int $idCoreType; 
	public \App\Models\Entity $entity; 
	public \App\Models\Template $template; 
	public \App\Models\TypeInstance $typeInstance; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function template()
	{
		return $this->template ?: $this->retrieveAssociation('template'); 
	}

	public function typeInstance()
	{
		return $this->typeInstance ?: $this->retrieveAssociation('typeInstance'); 
	}
}
