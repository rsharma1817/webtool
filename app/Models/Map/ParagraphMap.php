<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class ParagraphMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\Paragraph',
		'table' => 'paragraph',
		'primaryKey' => 'idParagraph',
		'attributes' => [
			'idParagraph' => [
				'column' => 'idParagraph',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'documentOrder' => [
				'column' => 'documentOrder',
				'type' => 'int'
			],
			'idDocument' => [
				'column' => 'idDocument',
				'type' => 'int'
			]
		],
		'associations' => [
			'document' => [
				'toClass' => '\\App\\Models\\Document',
				'cardinality' => 'oneToOne',
				'keys' => 'idDocument:idDocument'
			],
			'sentence' => [
				'toClass' => '\\App\\Models\\Sentence',
				'cardinality' => 'oneToMany',
				'keys' => 'idParagraph:idParagraph'
			]
		]
	];
}
