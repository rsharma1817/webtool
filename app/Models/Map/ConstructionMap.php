<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Map;

class ConstructionMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\Construction',
		'table' => 'construction',
		'primaryKey' => 'idConstruction',
		'attributes' => [
			'idConstruction' => [
				'column' => 'idConstruction',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'abstract' => [
				'column' => 'abstract',
				'type' => 'bool'
			],
			'active' => [
				'column' => 'active',
				'type' => 'bool'
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
			],
			'constructionElement' => [
				'toClass' => '\\App\\Models\\ConstructionElement',
				'cardinality' => 'oneToMany',
				'keys' => 'idConstruction:idConstruction'
			]
		]
	];
}
