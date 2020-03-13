<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class Qualia
 * 
 * @property int $idQualia
 * @property string $info
 * @property int $idEntity
 * @property int $idTypeInstance
 * 
 * @property \App\Models\Entity $entity
 * @property \App\Models\TypeInstance $typeInstance
 *
 * @package App\Models\Base
 */

class Qualia extends \MBusinessModel
{
	public int $idQualia; 
	public string $info = '';
	public int $idEntity; 
	public int $idTypeInstance; 
	public \App\Models\Entity $entity; 
	public \App\Models\TypeInstance $typeInstance; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function typeInstance()
	{
		return $this->typeInstance ?: $this->retrieveAssociation('typeInstance'); 
	}
}
