<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class FrameElementMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\FrameElement',
		'table' => 'frame_element',
		'primaryKey' => 'idFrameElement',
		'attributes' => [
			'idFrameElement' => [
				'column' => 'idFrameElement',
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
			],
			'idFrame' => [
				'column' => 'idFrame',
				'type' => 'int'
			],
			'idCoreType' => [
				'column' => 'idCoreType',
				'type' => 'int'
			]
		],
		'associations' => [
			'entity' => [
				'toClass' => '\\App\\Models\\Entity',
				'cardinality' => 'oneToOne',
				'keys' => 'idEntity:idEntity'
			],
			'frame' => [
				'toClass' => '\\App\\Models\\Frame',
				'cardinality' => 'oneToOne',
				'keys' => 'idFrame:idFrame'
			],
			'typeInstance' => [
				'toClass' => '\\App\\Models\\TypeInstance',
				'cardinality' => 'oneToOne',
				'keys' => 'idCoreType:idTypeInstance'
			],
			'mmObject' => [
				'toClass' => '\\App\\Models\\MmObject',
				'cardinality' => 'oneToMany',
				'keys' => 'idFrameElement:idFrameElement'
			]
		]
	];
}
