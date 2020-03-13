<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class EntityDomain
 * 
 * @property int $idEntity
 * @property int $idDomain
 * 
 * @property \App\Models\Domain $domain
 * @property \App\Models\Entity $entity
 *
 * @package App\Models\Base
 */

class EntityDomain extends \MBusinessModel
{
	public int $idEntity; 
	public int $idDomain; 
	public \App\Models\Domain $domain; 
	public \App\Models\Entity $entity; 

	public function domain()
	{
		return $this->domain ?: $this->retrieveAssociation('domain'); 
	}

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}
}
