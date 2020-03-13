<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class TemplateMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\Template',
		'table' => 'template',
		'primaryKey' => 'idTemplate',
		'attributes' => [
			'idTemplate' => [
				'column' => 'idTemplate',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'active' => [
				'column' => 'active',
				'type' => 'bool'
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
			'templateElement' => [
				'toClass' => '\\App\\Models\\TemplateElement',
				'cardinality' => 'oneToMany',
				'keys' => 'idTemplate:idTemplate'
			]
		]
	];
}
