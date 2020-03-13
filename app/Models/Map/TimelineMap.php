<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class TimelineMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\Timeline',
		'table' => 'timeline',
		'primaryKey' => 'idTimeline',
		'attributes' => [
			'idTimeline' => [
				'column' => 'idTimeline',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'numOrder' => [
				'column' => 'numOrder',
				'type' => 'int'
			],
			'tlDateTime' => [
				'column' => 'tlDateTime',
				'type' => 'timestamp'
			],
			'author' => [
				'column' => 'author',
				'type' => 'string'
			],
			'operation' => [
				'column' => 'operation',
				'type' => 'string'
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
