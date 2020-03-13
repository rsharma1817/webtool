<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Map;

class ConstructionElementMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\ConstructionElement',
		'table' => 'construction_element',
		'primaryKey' => 'idConstructionElement',
		'attributes' => [
			'idConstructionElement' => [
				'column' => 'idConstructionElement',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'active' => [
				'column' => 'active',
				'type' => 'bool'
			],
			'optional' => [
				'column' => 'optional',
				'type' => 'bool'
			],
			'head' => [
				'column' => 'head',
				'type' => 'bool'
			],
			'multiple' => [
				'column' => 'multiple',
				'type' => 'bool'
			],
			'idEntity' => [
				'column' => 'idEntity',
				'type' => 'int'
			],
			'idConstruction' => [
				'column' => 'idConstruction',
				'type' => 'int'
			]
		],
		'associations' => [
			'entity' => [
				'toClass' => '\\App\\Models\\Entity',
				'cardinality' => 'oneToOne',
				'keys' => 'idEntity:idEntity'
			],
			'construction' => [
				'toClass' => '\\App\\Models\\Construction',
				'cardinality' => 'oneToOne',
				'keys' => 'idConstruction:idConstruction'
			]
		]
	];
}
