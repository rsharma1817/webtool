<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class LexemeMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\Lexeme',
		'table' => 'lexeme',
		'primaryKey' => 'idLexeme',
		'attributes' => [
			'idLexeme' => [
				'column' => 'idLexeme',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'name' => [
				'column' => 'name',
				'type' => 'string'
			],
			'idPOS' => [
				'column' => 'idPOS',
				'type' => 'int'
			],
			'idLanguage' => [
				'column' => 'idLanguage',
				'type' => 'int'
			],
			'idEntity' => [
				'column' => 'idEntity',
				'type' => 'int'
			],
			'idUDPOS' => [
				'column' => 'idUDPOS',
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
			'pos' => [
				'toClass' => '\\App\\Models\\Pos',
				'cardinality' => 'oneToOne',
				'keys' => 'idPOS:idPOS'
			],
			'lexemeEntry' => [
				'toClass' => '\\App\\Models\\LexemeEntry',
				'cardinality' => 'oneToMany',
				'keys' => 'idLexeme:idLexeme'
			],
			'wordform' => [
				'toClass' => '\\App\\Models\\Wordform',
				'cardinality' => 'oneToMany',
				'keys' => 'idLexeme:idLexeme'
			]
		]
	];
}
