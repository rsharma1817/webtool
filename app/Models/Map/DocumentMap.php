<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Map;

class DocumentMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\Document',
		'table' => 'document',
		'primaryKey' => 'idDocument',
		'attributes' => [
			'idDocument' => [
				'column' => 'idDocument',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'author' => [
				'column' => 'author',
				'type' => 'string'
			],
			'idGenre' => [
				'column' => 'idGenre',
				'type' => 'int'
			],
			'idCorpus' => [
				'column' => 'idCorpus',
				'type' => 'int'
			],
			'idEntity' => [
				'column' => 'idEntity',
				'type' => 'int'
			]
		],
		'associations' => [
			'corpus' => [
				'toClass' => '\\App\\Models\\Corpus',
				'cardinality' => 'oneToOne',
				'keys' => 'idCorpus:idCorpus'
			],
			'entity' => [
				'toClass' => '\\App\\Models\\Entity',
				'cardinality' => 'oneToOne',
				'keys' => 'idEntity:idEntity'
			],
			'genre' => [
				'toClass' => '\\App\\Models\\Genre',
				'cardinality' => 'oneToOne',
				'keys' => 'idGenre:idGenre'
			],
			'mmDocument' => [
				'toClass' => '\\App\\Models\\MmDocument',
				'cardinality' => 'oneToMany',
				'keys' => 'idDocument:idDocument'
			],
			'paragraph' => [
				'toClass' => '\\App\\Models\\Paragraph',
				'cardinality' => 'oneToMany',
				'keys' => 'idDocument:idDocument'
			]
		]
	];
}
