<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class PropertyMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\Property',
		'table' => 'property',
		'primaryKey' => 'idProperty',
		'attributes' => [
			'idProperty' => [
				'column' => 'idProperty',
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
			]
		]
	];
}
