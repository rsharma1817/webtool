<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Map;

class C5LinkMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\C5Link',
		'table' => 'c5_link',
		'primaryKey' => 'idLink',
		'attributes' => [
			'idLink' => [
				'column' => 'idLink',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'relation' => [
				'column' => 'relation',
				'type' => 'string'
			],
			'idNodeSource' => [
				'column' => 'idNodeSource',
				'type' => 'int'
			],
			'idNodeTarget' => [
				'column' => 'idNodeTarget',
				'type' => 'int'
			]
		],
		'associations' => [
			'c5Node' => [
				'toClass' => '\\App\\Models\\C5Node',
				'cardinality' => 'oneToOne',
				'keys' => 'idNodeTarget:idNode'
			]
		]
	];
}
