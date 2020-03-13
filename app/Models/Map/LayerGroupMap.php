<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class LayerGroupMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\LayerGroup',
		'table' => 'layer_group',
		'primaryKey' => 'idLayerGroup',
		'attributes' => [
			'idLayerGroup' => [
				'column' => 'idLayerGroup',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'name' => [
				'column' => 'name',
				'type' => 'string'
			]
		],
		'associations' => [
			'layerType' => [
				'toClass' => '\\App\\Models\\LayerType',
				'cardinality' => 'oneToMany',
				'keys' => 'idLayerGroup:idLayerGroup'
			]
		]
	];
}
