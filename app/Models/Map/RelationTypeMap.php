<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class RelationTypeMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\RelationType',
		'table' => 'relation_type',
		'primaryKey' => 'idRelationType',
		'attributes' => [
			'idRelationType' => [
				'column' => 'idRelationType',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'prefix' => [
				'column' => 'prefix',
				'type' => 'string'
			],
			'nameEntity1' => [
				'column' => 'nameEntity1',
				'type' => 'string'
			],
			'nameEntity2' => [
				'column' => 'nameEntity2',
				'type' => 'string'
			],
			'nameEntity3' => [
				'column' => 'nameEntity3',
				'type' => 'string'
			],
			'idEntity' => [
				'column' => 'idEntity',
				'type' => 'int'
			],
			'idRelationGroup' => [
				'column' => 'idRelationGroup',
				'type' => 'int'
			]
		],
		'associations' => [
			'entity' => [
				'toClass' => '\\App\\Models\\Entity',
				'cardinality' => 'oneToOne',
				'keys' => 'idEntity:idEntity'
			],
			'relationGroup' => [
				'toClass' => '\\App\\Models\\RelationGroup',
				'cardinality' => 'oneToOne',
				'keys' => 'idRelationGroup:idRelationGroup'
			],
			'entityRelation' => [
				'toClass' => '\\App\\Models\\EntityRelation',
				'cardinality' => 'oneToMany',
				'keys' => 'idRelationType:idRelationType'
			]
		]
	];
}
