<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class C5Node
 * 
 * @property int $idNode
 * @property string $id
 * @property string $class
 * @property string $name
 * @property string $region
 * @property string $type
 * @property string $category
 * @property int $head
 * @property int $optional
 * @property int $idEntity
 * 
 * @property \App\Models\Entity $entity
 * @property Collection $c5Link
 *
 * @package App\Models\Base
 */

class C5Node extends \MBusinessModel
{
	public int $idNode; 
	public string $id = '';
	public string $class = '';
	public string $name = '';
	public string $region = '';
	public string $type = '';
	public string $category = '';
	public int $head; 
	public int $optional; 
	public int $idEntity; 
	public \App\Models\Entity $entity; 
	public Collection $c5Link; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function c5Link()
	{
		return $this->c5Link ?: $this->retrieveAssociation('c5Link'); 
	}
}
