<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class SemanticTypeMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\SemanticType',
		'table' => 'semantic_type',
		'primaryKey' => 'idSemanticType',
		'attributes' => [
			'idSemanticType' => [
				'column' => 'idSemanticType',
				'idgenerator' => 'identity',
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
			]
		]
	];
}
