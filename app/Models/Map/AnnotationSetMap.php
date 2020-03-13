<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Map;

class AnnotationSetMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\AnnotationSet',
		'table' => 'annotation_set',
		'primaryKey' => 'idAnnotationSet',
		'attributes' => [
			'idAnnotationSet' => [
				'column' => 'idAnnotationSet',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'idSubCorpus' => [
				'column' => 'idSubCorpus',
				'type' => 'int'
			],
			'idSentence' => [
				'column' => 'idSentence',
				'type' => 'int'
			],
			'idAnnotationStatus' => [
				'column' => 'idAnnotationStatus',
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
			'sentence' => [
				'toClass' => '\\App\\Models\\Sentence',
				'cardinality' => 'oneToOne',
				'keys' => 'idSentence:idSentence'
			],
			'subcorpus' => [
				'toClass' => '\\App\\Models\\Subcorpus',
				'cardinality' => 'oneToOne',
				'keys' => 'idSubCorpus:idSubCorpus'
			],
			'typeInstance' => [
				'toClass' => '\\App\\Models\\TypeInstance',
				'cardinality' => 'oneToOne',
				'keys' => 'idAnnotationStatus:idTypeInstance'
			],
			'asComments' => [
				'toClass' => '\\App\\Models\\AsComments',
				'cardinality' => 'oneToMany',
				'keys' => 'idAnnotationSet:idAnnotationSet'
			],
			'layer' => [
				'toClass' => '\\App\\Models\\Layer',
				'cardinality' => 'oneToMany',
				'keys' => 'idAnnotationSet:idAnnotationSet'
			],
			'mmAnnotationSet' => [
				'toClass' => '\\App\\Models\\MmAnnotationSet',
				'cardinality' => 'oneToMany',
				'keys' => 'idAnnotationSet:idAnnotationSet'
			]
		]
	];
}
