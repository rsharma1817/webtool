<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class Domain
 * 
 * @property int $idDomain
 * @property string $name
 * @property string $description
 * 
 * @property Collection $entity
 * @property Collection $Entity
 *
 * @package App\Models\Base
 */

class Domain extends \MBusinessModel
{
	public int $idDomain; 
	public string $name = '';
	public string $description = '';
	public Collection $entity; 
	public Collection $Entity; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

}
