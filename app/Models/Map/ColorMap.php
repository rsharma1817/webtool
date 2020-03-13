<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Map;

class ColorMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\Color',
		'table' => 'color',
		'primaryKey' => 'idColor',
		'attributes' => [
			'idColor' => [
				'column' => 'idColor',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'name' => [
				'column' => 'name',
				'type' => 'string'
			],
			'rgbFg' => [
				'column' => 'rgbFg',
				'type' => 'string'
			],
			'rgbBg' => [
				'column' => 'rgbBg',
				'type' => 'string'
			]
		],
		'associations' => [
			'entity' => [
				'toClass' => '\\App\\Models\\Entity',
				'cardinality' => 'oneToMany',
				'keys' => 'idColor:idColor'
			]
		]
	];
}
