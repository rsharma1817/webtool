<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class MmSentenceMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\MmSentence',
		'table' => 'mm_sentence',
		'primaryKey' => 'idSentenceMM',
		'attributes' => [
			'idSentenceMM' => [
				'column' => 'idSentenceMM',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'startTimestamp' => [
				'column' => 'startTimestamp',
				'type' => 'string'
			],
			'endTimestamp' => [
				'column' => 'endTimestamp',
				'type' => 'string'
			],
			'idSentence' => [
				'column' => 'idSentence',
				'type' => 'int'
			]
		],
		'associations' => [
			'sentence' => [
				'toClass' => '\\App\\Models\\Sentence',
				'cardinality' => 'oneToOne',
				'keys' => 'idSentence:idSentence'
			],
			'mmAnnotationSet' => [
				'toClass' => '\\App\\Models\\MmAnnotationSet',
				'cardinality' => 'oneToMany',
				'keys' => 'idSentenceMM:idSentenceMM'
			]
		]
	];
}
