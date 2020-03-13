<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class RelationGroupMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\RelationGroup',
		'table' => 'relation_group',
		'primaryKey' => 'idRelationGroup',
		'attributes' => [
			'idRelationGroup' => [
				'column' => 'idRelationGroup',
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
			],
			'relationType' => [
				'toClass' => '\\App\\Models\\RelationType',
				'cardinality' => 'oneToMany',
				'keys' => 'idRelationGroup:idRelationGroup'
			]
		]
	];
}
