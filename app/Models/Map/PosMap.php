<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class PosMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\Pos',
		'table' => '',
		'primaryKey' => 'idPOS',
		'attributes' => [
			'idPOS' => [
				'column' => 'idPOS',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'POS' => [
				'column' => 'POS',
				'type' => 'string'
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
			'lemma' => [
				'toClass' => '\\App\\Models\\Lemma',
				'cardinality' => 'oneToMany',
				'keys' => 'idPOS:idPOS'
			],
			'lexeme' => [
				'toClass' => '\\App\\Models\\Lexeme',
				'cardinality' => 'oneToMany',
				'keys' => 'idPOS:idPOS'
			],
			'posUdPos' => [
				'toClass' => '\\App\\Models\\PosUdPos',
				'cardinality' => 'oneToMany',
				'keys' => 'idPOS:idPOS'
			],
			'udPos' => [
				'toClass' => '\\App\\Models\\UdPos',
				'cardinality' => 'manyToMany',
				'associative' => 'pos_ud_pos'
			]
		]
	];
}
