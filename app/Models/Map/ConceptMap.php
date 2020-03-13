<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Map;

class ConceptMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\Concept',
		'table' => 'concept',
		'primaryKey' => 'idConcept',
		'attributes' => [
			'idConcept' => [
				'column' => 'idConcept',
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
