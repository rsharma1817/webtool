<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class Layer
 * 
 * @property int $idLayer
 * @property int $rank
 * @property int $idAnnotationSet
 * @property int $idLayerType
 * @property int $idEntity
 * 
 * @property \App\Models\AnnotationSet $annotationSet
 * @property \App\Models\Entity $entity
 * @property \App\Models\LayerType $layerType
 * @property Collection $label
 *
 * @package App\Models\Base
 */

class Layer extends \MBusinessModel
{
	public int $idLayer; 
	public int $rank; 
	public int $idAnnotationSet; 
	public int $idLayerType; 
	public int $idEntity; 
	public \App\Models\AnnotationSet $annotationSet; 
	public \App\Models\Entity $entity; 
	public \App\Models\LayerType $layerType; 
	public Collection $label; 

	public function annotationSet()
	{
		return $this->annotationSet ?: $this->retrieveAssociation('annotationSet'); 
	}

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function layerType()
	{
		return $this->layerType ?: $this->retrieveAssociation('layerType'); 
	}

	public function label()
	{
		return $this->label ?: $this->retrieveAssociation('label'); 
	}
}
