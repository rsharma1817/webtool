<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class GenericLabelMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\GenericLabel',
		'table' => 'generic_label',
		'primaryKey' => 'idGenericLabel',
		'attributes' => [
			'idGenericLabel' => [
				'column' => 'idGenericLabel',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'name' => [
				'column' => 'name',
				'type' => 'string'
			],
			'definition' => [
				'column' => 'definition',
				'type' => 'string'
			],
			'example' => [
				'column' => 'example',
				'type' => 'string'
			],
			'idEntity' => [
				'column' => 'idEntity',
				'type' => 'int'
			],
			'idLanguage' => [
				'column' => 'idLanguage',
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
