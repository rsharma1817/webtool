<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class UdRelationMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\UdRelation',
		'table' => 'ud_relation',
		'primaryKey' => 'idUDRelation',
		'attributes' => [
			'idUDRelation' => [
				'column' => 'idUDRelation',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'info' => [
				'column' => 'info',
				'type' => 'string'
			],
			'idTypeInstance' => [
				'column' => 'idTypeInstance',
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
			'typeInstance' => [
				'toClass' => '\\App\\Models\\TypeInstance',
				'cardinality' => 'oneToOne',
				'keys' => 'idTypeInstance:idTypeInstance'
			]
		]
	];
}
