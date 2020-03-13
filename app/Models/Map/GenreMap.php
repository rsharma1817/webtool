<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class GenreMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\Genre',
		'table' => 'genre',
		'primaryKey' => 'idGenre',
		'attributes' => [
			'idGenre' => [
				'column' => 'idGenre',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'idGenreType' => [
				'column' => 'idGenreType',
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
			'genreType' => [
				'toClass' => '\\App\\Models\\GenreType',
				'cardinality' => 'oneToOne',
				'keys' => 'idGenreType:idGenreType'
			],
			'document' => [
				'toClass' => '\\App\\Models\\Document',
				'cardinality' => 'oneToMany',
				'keys' => 'idGenre:idGenre'
			]
		]
	];
}
