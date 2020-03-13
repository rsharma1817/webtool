<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class LuMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\Lu',
		'table' => 'lu',
		'primaryKey' => 'idLU',
		'attributes' => [
			'idLU' => [
				'column' => 'idLU',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'name' => [
				'column' => 'name',
				'type' => 'string'
			],
			'senseDescription' => [
				'column' => 'senseDescription',
				'type' => 'string'
			],
			'active' => [
				'column' => 'active',
				'type' => 'bool'
			],
			'importNum' => [
				'column' => 'importNum',
				'type' => 'int'
			],
			'incorporatedFE' => [
				'column' => 'incorporatedFE',
				'type' => 'int'
			],
			'bff' => [
				'column' => 'bff',
				'type' => 'int'
			],
			'bffOther' => [
				'column' => 'bffOther',
				'type' => 'string'
			],
			'idEntity' => [
				'column' => 'idEntity',
				'type' => 'int'
			],
			'idLemma' => [
				'column' => 'idLemma',
				'type' => 'int'
			],
			'idFrame' => [
				'column' => 'idFrame',
				'type' => 'int'
			]
		],
		'associations' => [
			'entity' => [
				'toClass' => '\\App\\Models\\Entity',
				'cardinality' => 'oneToOne',
				'keys' => 'idEntity:idEntity'
			],
			'frame' => [
				'toClass' => '\\App\\Models\\Frame',
				'cardinality' => 'oneToOne',
				'keys' => 'idFrame:idFrame'
			],
			'lemma' => [
				'toClass' => '\\App\\Models\\Lemma',
				'cardinality' => 'oneToOne',
				'keys' => 'idLemma:idLemma'
			]
		]
	];
}
