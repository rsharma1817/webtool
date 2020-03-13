<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class LabelMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\Label',
		'table' => 'label',
		'primaryKey' => 'idLabel',
		'attributes' => [
			'idLabel' => [
				'column' => 'idLabel',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'startChar' => [
				'column' => 'startChar',
				'type' => 'int'
			],
			'endChar' => [
				'column' => 'endChar',
				'type' => 'int'
			],
			'multi' => [
				'column' => 'multi',
				'type' => 'bool'
			],
			'idLabelType' => [
				'column' => 'idLabelType',
				'type' => 'int'
			],
			'idLayer' => [
				'column' => 'idLayer',
				'type' => 'int'
			],
			'idInstantiationType' => [
				'column' => 'idInstantiationType',
				'type' => 'int'
			]
		],
		'associations' => [
			'entity' => [
				'toClass' => '\\App\\Models\\Entity',
				'cardinality' => 'oneToOne',
				'keys' => 'idLabelType:idEntity'
			],
			'layer' => [
				'toClass' => '\\App\\Models\\Layer',
				'cardinality' => 'oneToOne',
				'keys' => 'idLayer:idLayer'
			],
			'typeInstance' => [
				'toClass' => '\\App\\Models\\TypeInstance',
				'cardinality' => 'oneToOne',
				'keys' => 'idInstantiationType:idTypeInstance'
			]
		]
	];
}
