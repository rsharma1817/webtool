<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class LayerType
 * 
 * @property int $idLayerType
 * @property bool $allowsApositional
 * @property bool $isAnnotation
 * @property int $layerOrder
 * @property int $idLayerGroup
 * @property int $idEntity
 * 
 * @property \App\Models\Entity $entity
 * @property \App\Models\LayerGroup $layerGroup
 * @property Collection $layer
 *
 * @package App\Models\Base
 */

class LayerType extends \MBusinessModel
{
	public int $idLayerType; 
	public bool $allowsApositional = false;
	public bool $isAnnotation = false;
	public int $layerOrder; 
	public int $idLayerGroup; 
	public int $idEntity; 
	public \App\Models\Entity $entity; 
	public \App\Models\LayerGroup $layerGroup; 
	public Collection $layer; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function layerGroup()
	{
		return $this->layerGroup ?: $this->retrieveAssociation('layerGroup'); 
	}

	public function layer()
	{
		return $this->layer ?: $this->retrieveAssociation('layer'); 
	}
}
