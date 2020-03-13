<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class SubcorpusMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\Subcorpus',
		'table' => 'subcorpus',
		'primaryKey' => 'idSubCorpus',
		'attributes' => [
			'idSubCorpus' => [
				'column' => 'idSubCorpus',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'name' => [
				'column' => 'name',
				'type' => 'string'
			],
			'rank' => [
				'column' => 'rank',
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
			'annotationSet' => [
				'toClass' => '\\App\\Models\\AnnotationSet',
				'cardinality' => 'oneToMany',
				'keys' => 'idSubCorpus:idSubCorpus'
			]
		]
	];
}
