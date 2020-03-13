<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Map;

class ConstraintInstanceMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\ConstraintInstance',
		'table' => 'constraint_instance',
		'primaryKey' => 'idConstraintInstance',
		'attributes' => [
			'idConstraintInstance' => [
				'column' => 'idConstraintInstance',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'idConstraint' => [
				'column' => 'idConstraint',
				'type' => 'int'
			],
			'idConstrained' => [
				'column' => 'idConstrained',
				'type' => 'int'
			],
			'idConstrainedBy' => [
				'column' => 'idConstrainedBy',
				'type' => 'int'
			],
			'idConstraintType' => [
				'column' => 'idConstraintType',
				'type' => 'int'
			]
		],
		'associations' => [
			'constraintType' => [
				'toClass' => '\\App\\Models\\ConstraintType',
				'cardinality' => 'oneToOne',
				'keys' => 'idConstraintType:idConstraintType'
			],
			'entity' => [
				'toClass' => '\\App\\Models\\Entity',
				'cardinality' => 'oneToOne',
				'keys' => 'idConstraint:idEntity'
			]
		]
	];
}
