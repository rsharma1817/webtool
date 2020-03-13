<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class UdPosMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\UdPos',
		'table' => '',
		'primaryKey' => 'idUDPOS',
		'attributes' => [
			'idUDPOS' => [
				'column' => 'idUDPOS',
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
			'pos' => [
				'toClass' => '\\App\\Models\\Pos',
				'cardinality' => 'manyToMany',
				'associative' => 'pos_ud_pos'
			]
		]
	];
}
