<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class QualiaMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\Qualia',
		'table' => 'qualia',
		'primaryKey' => 'idQualia',
		'attributes' => [
			'idQualia' => [
				'column' => 'idQualia',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'info' => [
				'column' => 'info',
				'type' => 'string'
			],
			'idEntity' => [
				'column' => 'idEntity',
				'type' => 'int'
			],
			'idTypeInstance' => [
				'column' => 'idTypeInstance',
				'type' => 'int'
			]
		],
		'associations' => [
			'entity' => [
				'toClass' => '\\App\\Models\\Entity',
				'cardinality' => 'oneToOne',
				'keys' => 'idEntity:idEntity'
			],
			'typeInstance' => [
				'toClass' => '\\App\\Models\\TypeInstance',
				'cardinality' => 'oneToOne',
				'keys' => 'idTypeInstance:idTypeInstance'
			]
		]
	];
}
