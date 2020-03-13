<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class GenreTypeMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\GenreType',
		'table' => 'genre_type',
		'primaryKey' => 'idGenreType',
		'attributes' => [
			'idGenreType' => [
				'column' => 'idGenreType',
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
			],
			'genre' => [
				'toClass' => '\\App\\Models\\Genre',
				'cardinality' => 'oneToMany',
				'keys' => 'idGenreType:idGenreType'
			]
		]
	];
}
