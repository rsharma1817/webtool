<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class WordformMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\Wordform',
		'table' => 'wordform',
		'primaryKey' => 'idWordForm',
		'attributes' => [
			'idWordForm' => [
				'column' => 'idWordForm',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'form' => [
				'column' => 'form',
				'type' => 'string'
			],
			'idLexeme' => [
				'column' => 'idLexeme',
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
			'lexeme' => [
				'toClass' => '\\App\\Models\\Lexeme',
				'cardinality' => 'oneToOne',
				'keys' => 'idLexeme:idLexeme'
			]
		]
	];
}
