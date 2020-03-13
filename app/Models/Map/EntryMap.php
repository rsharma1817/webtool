<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class EntryMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\Entry',
		'table' => 'entry',
		'primaryKey' => 'idEntry',
		'attributes' => [
			'idEntry' => [
				'column' => 'idEntry',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'entry' => [
				'column' => 'entry',
				'type' => 'string'
			],
			'name' => [
				'column' => 'name',
				'type' => 'string'
			],
			'description' => [
				'column' => 'description',
				'type' => 'string'
			],
			'nick' => [
				'column' => 'nick',
				'type' => 'string'
			],
			'idLanguage' => [
				'column' => 'idLanguage',
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
			'language' => [
				'toClass' => '\\App\\Models\\Language',
				'cardinality' => 'oneToOne',
				'keys' => 'idLanguage:idLanguage'
			]
		]
	];
}
