<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Map;

class CorpusMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\Corpus',
		'table' => 'corpus',
		'primaryKey' => 'idCorpus',
		'attributes' => [
			'idCorpus' => [
				'column' => 'idCorpus',
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
			'document' => [
				'toClass' => '\\App\\Models\\Document',
				'cardinality' => 'oneToMany',
				'keys' => 'idCorpus:idCorpus'
			]
		]
	];
}
