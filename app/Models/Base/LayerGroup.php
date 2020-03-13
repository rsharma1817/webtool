<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class LayerGroup
 * 
 * @property int $idLayerGroup
 * @property string $name
 * 
 * @property Collection $layerType
 *
 * @package App\Models\Base
 */

class LayerGroup extends \MBusinessModel
{
	public int $idLayerGroup; 
	public string $name = '';
	public Collection $layerType; 

	public function layerType()
	{
		return $this->layerType ?: $this->retrieveAssociation('layerType'); 
	}
}
