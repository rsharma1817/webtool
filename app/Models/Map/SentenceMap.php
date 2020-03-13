<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class SentenceMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\Sentence',
		'table' => 'sentence',
		'primaryKey' => 'idSentence',
		'attributes' => [
			'idSentence' => [
				'column' => 'idSentence',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'text' => [
				'column' => 'text',
				'type' => 'string'
			],
			'paragraphOrder' => [
				'column' => 'paragraphOrder',
				'type' => 'int'
			],
			'idParagraph' => [
				'column' => 'idParagraph',
				'type' => 'int'
			],
			'idLanguage' => [
				'column' => 'idLanguage',
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
			'language' => [
				'toClass' => '\\App\\Models\\Language',
				'cardinality' => 'oneToOne',
				'keys' => 'idLanguage:idLanguage'
			],
			'paragraph' => [
				'toClass' => '\\App\\Models\\Paragraph',
				'cardinality' => 'oneToOne',
				'keys' => 'idParagraph:idParagraph'
			],
			'annotationSet' => [
				'toClass' => '\\App\\Models\\AnnotationSet',
				'cardinality' => 'oneToMany',
				'keys' => 'idSentence:idSentence'
			],
			'mmSentence' => [
				'toClass' => '\\App\\Models\\MmSentence',
				'cardinality' => 'oneToMany',
				'keys' => 'idSentence:idSentence'
			]
		]
	];
}
