<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class MmDocumentMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\MmDocument',
		'table' => 'mm_document',
		'primaryKey' => 'idDocumentMM',
		'attributes' => [
			'idDocumentMM' => [
				'column' => 'idDocumentMM',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'audioPath' => [
				'column' => 'audioPath',
				'type' => 'string'
			],
			'visualPath' => [
				'column' => 'visualPath',
				'type' => 'string'
			],
			'alignPath' => [
				'column' => 'alignPath',
				'type' => 'string'
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
			]
		]
	];
}
