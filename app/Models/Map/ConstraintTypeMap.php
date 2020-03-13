<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Map;

class ConstraintTypeMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\ConstraintType',
		'table' => 'constraint_type',
		'primaryKey' => 'idConstraintType',
		'attributes' => [
			'idConstraintType' => [
				'column' => 'idConstraintType',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'prefix' => [
				'column' => 'prefix',
				'type' => 'string'
			],
			'typeEntity1' => [
				'column' => 'typeEntity1',
				'type' => 'string'
			],
			'typeEntity2' => [
				'column' => 'typeEntity2',
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
			],
			'constraintInstance' => [
				'toClass' => '\\App\\Models\\ConstraintInstance',
				'cardinality' => 'oneToMany',
				'keys' => 'idConstraintType:idConstraintType'
			]
		]
	];
}
