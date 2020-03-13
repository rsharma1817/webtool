<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class TypeMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\Type',
		'table' => 'type',
		'primaryKey' => 'idType',
		'attributes' => [
			'idType' => [
				'column' => 'idType',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'type' => [
				'column' => 'type',
				'type' => 'string'
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
			'typeInstance' => [
				'toClass' => '\\App\\Models\\TypeInstance',
				'cardinality' => 'oneToMany',
				'keys' => 'idType:idType'
			]
		]
	];
}
