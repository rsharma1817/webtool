<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class LayerTypeMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\LayerType',
		'table' => 'layer_type',
		'primaryKey' => 'idLayerType',
		'attributes' => [
			'idLayerType' => [
				'column' => 'idLayerType',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'allowsApositional' => [
				'column' => 'allowsApositional',
				'type' => 'bool'
			],
			'isAnnotation' => [
				'column' => 'isAnnotation',
				'type' => 'bool'
			],
			'layerOrder' => [
				'column' => 'layerOrder',
				'type' => 'int'
			],
			'idLayerGroup' => [
				'column' => 'idLayerGroup',
				'type' => 'int'
			],
			'idEntity' => [
				'column' => 'idEntity',
				'type' => 'int'
			]
		],
		'associations' => [
			'entity' => [
				'toClass' => '\\App\\Models\\Entity',
				'cardinality' => 'oneToOne',
				'keys' => 'idEntity:idEntity'
			],
			'layerGroup' => [
				'toClass' => '\\App\\Models\\LayerGroup',
				'cardinality' => 'oneToOne',
				'keys' => 'idLayerGroup:idLayerGroup'
			],
			'layer' => [
				'toClass' => '\\App\\Models\\Layer',
				'cardinality' => 'oneToMany',
				'keys' => 'idLayerType:idLayerType'
			]
		]
	];
}
