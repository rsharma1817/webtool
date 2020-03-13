<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class PosUdPosMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\PosUdPos',
		'table' => '',
		'primaryKey' => '',
		'attributes' => [
			'idPOS' => [
				'column' => 'idPOS',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'idUDPOS' => [
				'column' => 'idUDPOS',
				'type' => 'int'
			]
		],
		'associations' => [
			'pos' => [
				'toClass' => '\\App\\Models\\Pos',
				'cardinality' => 'oneToOne',
				'keys' => 'idPOS:idPOS'
			],
			'udPos' => [
				'toClass' => '\\App\\Models\\UdPos',
				'cardinality' => 'oneToOne',
				'keys' => 'idUDPOS:idUDPOS'
			]
		]
	];
}
