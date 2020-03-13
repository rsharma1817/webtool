<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class LexemeEntryMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\LexemeEntry',
		'table' => 'lexeme_entry',
		'primaryKey' => 'idLexemeEntry',
		'attributes' => [
			'idLexemeEntry' => [
				'column' => 'idLexemeEntry',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'lexemeOrder' => [
				'column' => 'lexemeOrder',
				'type' => 'int'
			],
			'breakBefore' => [
				'column' => 'breakBefore',
				'type' => 'bool'
			],
			'headWord' => [
				'column' => 'headWord',
				'type' => 'bool'
			],
			'idLexeme' => [
				'column' => 'idLexeme',
				'type' => 'int'
			],
			'idLemma' => [
				'column' => 'idLemma',
				'type' => 'int'
			]
		],
		'associations' => [
			'lemma' => [
				'toClass' => '\\App\\Models\\Lemma',
				'cardinality' => 'oneToOne',
				'keys' => 'idLemma:idLemma'
			],
			'lexeme' => [
				'toClass' => '\\App\\Models\\Lexeme',
				'cardinality' => 'oneToOne',
				'keys' => 'idLexeme:idLexeme'
			]
		]
	];
}
