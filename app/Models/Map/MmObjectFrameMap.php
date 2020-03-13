<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class MmObjectFrameMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\MmObjectFrame',
		'table' => 'mm_object_frame',
		'primaryKey' => 'idObjectFrameMM',
		'attributes' => [
			'idObjectFrameMM' => [
				'column' => 'idObjectFrameMM',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'frameNumber' => [
				'column' => 'frameNumber',
				'type' => 'int'
			],
			'x' => [
				'column' => 'x',
				'type' => 'int'
			],
			'y' => [
				'column' => 'y',
				'type' => 'int'
			],
			'width' => [
				'column' => 'width',
				'type' => 'int'
			],
			'height' => [
				'column' => 'height',
				'type' => 'int'
			],
			'blocked' => [
				'column' => 'blocked',
				'type' => 'int'
			],
			'idObjectMM' => [
				'column' => 'idObjectMM',
				'type' => 'int'
			]
		],
		'associations' => [
			'mmObject' => [
				'toClass' => '\\App\\Models\\MmObject',
				'cardinality' => 'oneToOne',
				'keys' => 'idObjectMM:idObjectMM'
			]
		]
	];
}
