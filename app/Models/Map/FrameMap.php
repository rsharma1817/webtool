<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class FrameMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\Frame',
		'table' => 'frame',
		'primaryKey' => 'idFrame',
		'attributes' => [
			'idFrame' => [
				'column' => 'idFrame',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'active' => [
				'column' => 'active',
				'type' => 'bool'
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
			'frameElement' => [
				'toClass' => '\\App\\Models\\FrameElement',
				'cardinality' => 'oneToMany',
				'keys' => 'idFrame:idFrame'
			],
			'lu' => [
				'toClass' => '\\App\\Models\\Lu',
				'cardinality' => 'oneToMany',
				'keys' => 'idFrame:idFrame'
			]
		]
	];
}
