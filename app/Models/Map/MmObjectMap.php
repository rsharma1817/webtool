<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class MmObjectMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\MmObject',
		'table' => 'mm_object',
		'primaryKey' => 'idObjectMM',
		'attributes' => [
			'idObjectMM' => [
				'column' => 'idObjectMM',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'name' => [
				'column' => 'name',
				'type' => 'string'
			],
			'startFrame' => [
				'column' => 'startFrame',
				'type' => 'int'
			],
			'endFrame' => [
				'column' => 'endFrame',
				'type' => 'int'
			],
			'idAnnotationSetMM' => [
				'column' => 'idAnnotationSetMM',
				'type' => 'int'
			],
			'idFrameElement' => [
				'column' => 'idFrameElement',
				'type' => 'int'
			]
		],
		'associations' => [
			'frameElement' => [
				'toClass' => '\\App\\Models\\FrameElement',
				'cardinality' => 'oneToOne',
				'keys' => 'idFrameElement:idFrameElement'
			],
			'mmAnnotationSet' => [
				'toClass' => '\\App\\Models\\MmAnnotationSet',
				'cardinality' => 'oneToOne',
				'keys' => 'idAnnotationSetMM:idAnnotationSetMM'
			],
			'mmObjectFrame' => [
				'toClass' => '\\App\\Models\\MmObjectFrame',
				'cardinality' => 'oneToMany',
				'keys' => 'idObjectMM:idObjectMM'
			]
		]
	];
}
