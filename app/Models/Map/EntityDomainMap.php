<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Map;

class EntityDomainMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\EntityDomain',
		'table' => 'entity_domain',
		'primaryKey' => '',
		'attributes' => [
			'idEntity' => [
				'column' => 'idEntity',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'idDomain' => [
				'column' => 'idDomain',
				'type' => 'int'
			]
		],
		'associations' => [
			'domain' => [
				'toClass' => '\\App\\Models\\Domain',
				'cardinality' => 'oneToOne',
				'keys' => 'idDomain:idDomain'
			],
			'entity' => [
				'toClass' => '\\App\\Models\\Entity',
				'cardinality' => 'oneToOne',
				'keys' => 'idEntity:idEntity'
			]
		]
	];
}
