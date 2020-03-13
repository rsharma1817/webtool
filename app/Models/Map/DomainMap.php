<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Map;

class DomainMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\Domain',
		'table' => 'domain',
		'primaryKey' => 'idDomain',
		'attributes' => [
			'idDomain' => [
				'column' => 'idDomain',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'name' => [
				'column' => 'name',
				'type' => 'string'
			],
			'description' => [
				'column' => 'description',
				'type' => 'string'
			]
		],
		'associations' => [
			'entity' => [
				'toClass' => '\\App\\Models\\Entity',
				'cardinality' => 'manyToMany',
				'associative' => 'entity_domain'
			]
		]
	];
}
