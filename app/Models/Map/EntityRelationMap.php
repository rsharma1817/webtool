<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class EntityRelationMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\EntityRelation',
		'table' => 'entity_relation',
		'primaryKey' => 'idEntityRelation',
		'attributes' => [
			'idEntityRelation' => [
				'column' => 'idEntityRelation',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'idEntity1' => [
				'column' => 'idEntity1',
				'type' => 'int'
			],
			'idEntity2' => [
				'column' => 'idEntity2',
				'type' => 'int'
			],
			'idEntity3' => [
				'column' => 'idEntity3',
				'type' => 'int'
			],
			'idRelationType' => [
				'column' => 'idRelationType',
				'type' => 'int'
			]
		],
		'associations' => [
			'entity' => [
				'toClass' => '\\App\\Models\\Entity',
				'cardinality' => 'oneToOne',
				'keys' => 'idEntity3:idEntity'
			],
			'relationType' => [
				'toClass' => '\\App\\Models\\RelationType',
				'cardinality' => 'oneToOne',
				'keys' => 'idRelationType:idRelationType'
			]
		]
	];
}
