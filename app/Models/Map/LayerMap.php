<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class LayerMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\Layer',
		'table' => 'layer',
		'primaryKey' => 'idLayer',
		'attributes' => [
			'idLayer' => [
				'column' => 'idLayer',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'rank' => [
				'column' => 'rank',
				'type' => 'int'
			],
			'idAnnotationSet' => [
				'column' => 'idAnnotationSet',
				'type' => 'int'
			],
			'idLayerType' => [
				'column' => 'idLayerType',
				'type' => 'int'
			],
			'idEntity' => [
				'column' => 'idEntity',
				'type' => 'int'
			]
		],
		'associations' => [
			'annotationSet' => [
				'toClass' => '\\App\\Models\\AnnotationSet',
				'cardinality' => 'oneToOne',
				'keys' => 'idAnnotationSet:idAnnotationSet'
			],
			'entity' => [
				'toClass' => '\\App\\Models\\Entity',
				'cardinality' => 'oneToOne',
				'keys' => 'idEntity:idEntity'
			],
			'layerType' => [
				'toClass' => '\\App\\Models\\LayerType',
				'cardinality' => 'oneToOne',
				'keys' => 'idLayerType:idLayerType'
			],
			'label' => [
				'toClass' => '\\App\\Models\\Label',
				'cardinality' => 'oneToMany',
				'keys' => 'idLayer:idLayer'
			]
		]
	];
}
