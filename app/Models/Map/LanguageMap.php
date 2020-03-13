<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class LanguageMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\Language',
		'table' => 'language',
		'primaryKey' => 'idLanguage',
		'attributes' => [
			'idLanguage' => [
				'column' => 'idLanguage',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'language' => [
				'column' => 'language',
				'type' => 'string'
			],
			'description' => [
				'column' => 'description',
				'type' => 'string'
			]
		],
		'associations' => [
			'construction' => [
				'toClass' => '\\App\\Models\\Construction',
				'cardinality' => 'oneToMany',
				'keys' => 'idLanguage:idLanguage'
			],
			'entry' => [
				'toClass' => '\\App\\Models\\Entry',
				'cardinality' => 'oneToMany',
				'keys' => 'idLanguage:idLanguage'
			],
			'genericLabel' => [
				'toClass' => '\\App\\Models\\GenericLabel',
				'cardinality' => 'oneToMany',
				'keys' => 'idLanguage:idLanguage'
			],
			'lemma' => [
				'toClass' => '\\App\\Models\\Lemma',
				'cardinality' => 'oneToMany',
				'keys' => 'idLanguage:idLanguage'
			],
			'lexeme' => [
				'toClass' => '\\App\\Models\\Lexeme',
				'cardinality' => 'oneToMany',
				'keys' => 'idLanguage:idLanguage'
			],
			'sentence' => [
				'toClass' => '\\App\\Models\\Sentence',
				'cardinality' => 'oneToMany',
				'keys' => 'idLanguage:idLanguage'
			]
		]
	];
}
