<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class MmAnnotationSetMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\MmAnnotationSet',
		'table' => 'mm_annotation_set',
		'primaryKey' => 'idAnnotationSetMM',
		'attributes' => [
			'idAnnotationSetMM' => [
				'column' => 'idAnnotationSetMM',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'annotationPath' => [
				'column' => 'annotationPath',
				'type' => 'string'
			],
			'idSentenceMM' => [
				'column' => 'idSentenceMM',
				'type' => 'int'
			],
			'idAnnotationSet' => [
				'column' => 'idAnnotationSet',
				'type' => 'int'
			],
			'idEntity' => [
				'column' => 'idEntity',
				'type' => 'int'
			]
		],
		'associations' => [
			'annotationSet' => [
				'toClass' => '\\App\\Models\\AnnotationSet',
				'cardinality' => 'oneToOne',
				'keys' => 'idAnnotationSet:idAnnotationSet'
			],
			'entity' => [
				'toClass' => '\\App\\Models\\Entity',
				'cardinality' => 'oneToOne',
				'keys' => 'idEntity:idEntity'
			],
			'mmSentence' => [
				'toClass' => '\\App\\Models\\MmSentence',
				'cardinality' => 'oneToOne',
				'keys' => 'idSentenceMM:idSentenceMM'
			],
			'mmObject' => [
				'toClass' => '\\App\\Models\\MmObject',
				'cardinality' => 'oneToMany',
				'keys' => 'idAnnotationSetMM:idAnnotationSetMM'
			]
		]
	];
}
