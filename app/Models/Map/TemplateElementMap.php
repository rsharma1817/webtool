<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class TemplateElementMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\TemplateElement',
		'table' => 'template_element',
		'primaryKey' => 'idTemplateElement',
		'attributes' => [
			'idTemplateElement' => [
				'column' => 'idTemplateElement',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'active' => [
				'column' => 'active',
				'type' => 'bool'
			],
			'idTemplate' => [
				'column' => 'idTemplate',
				'type' => 'int'
			],
			'idEntity' => [
				'column' => 'idEntity',
				'type' => 'int'
			],
			'idCoreType' => [
				'column' => 'idCoreType',
				'type' => 'int'
			]
		],
		'associations' => [
			'entity' => [
				'toClass' => '\\App\\Models\\Entity',
				'cardinality' => 'oneToOne',
				'keys' => 'idEntity:idEntity'
			],
			'template' => [
				'toClass' => '\\App\\Models\\Template',
				'cardinality' => 'oneToOne',
				'keys' => 'idTemplate:idTemplate'
			],
			'typeInstance' => [
				'toClass' => '\\App\\Models\\TypeInstance',
				'cardinality' => 'oneToOne',
				'keys' => 'idCoreType:idTypeInstance'
			]
		]
	];
}
