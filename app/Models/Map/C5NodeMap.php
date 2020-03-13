<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Map;

class C5NodeMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\C5Node',
		'table' => 'c5_node',
		'primaryKey' => 'idNode',
		'attributes' => [
			'idNode' => [
				'column' => 'idNode',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'id' => [
				'column' => 'id',
				'type' => 'string'
			],
			'class' => [
				'column' => 'class',
				'type' => 'string'
			],
			'name' => [
				'column' => 'name',
				'type' => 'string'
			],
			'region' => [
				'column' => 'region',
				'type' => 'string'
			],
			'type' => [
				'column' => 'type',
				'type' => 'string'
			],
			'category' => [
				'column' => 'category',
				'type' => 'string'
			],
			'head' => [
				'column' => 'head',
				'type' => 'int'
			],
			'optional' => [
				'column' => 'optional',
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
			'c5Link' => [
				'toClass' => '\\App\\Models\\C5Link',
				'cardinality' => 'oneToMany',
				'keys' => 'idNodeTarget:idNodeTarget'
			]
		]
	];
}
