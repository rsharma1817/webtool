<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Map;

class TypeInstanceMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\TypeInstance',
		'table' => 'type_instance',
		'primaryKey' => 'idTypeInstance',
		'attributes' => [
			'idTypeInstance' => [
				'column' => 'idTypeInstance',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'info' => [
				'column' => 'info',
				'type' => 'string'
			],
			'flag' => [
				'column' => 'flag',
				'type' => 'bool'
			],
			'idType' => [
				'column' => 'idType',
				'type' => 'int'
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
			'type' => [
				'toClass' => '\\App\\Models\\Type',
				'cardinality' => 'oneToOne',
				'keys' => 'idType:idType'
			],
			'annotationSet' => [
				'toClass' => '\\App\\Models\\AnnotationSet',
				'cardinality' => 'oneToMany',
				'keys' => 'idAnnotationStatus:idAnnotationStatus'
			],
			'constraintType' => [
				'toClass' => '\\App\\Models\\ConstraintType',
				'cardinality' => 'oneToMany',
				'keys' => 'idTypeInstance:idTypeInstance'
			],
			'frameElement' => [
				'toClass' => '\\App\\Models\\FrameElement',
				'cardinality' => 'oneToMany',
				'keys' => 'idCoreType:idCoreType'
			],
			'label' => [
				'toClass' => '\\App\\Models\\Label',
				'cardinality' => 'oneToMany',
				'keys' => 'idInstantiationType:idInstantiationType'
			],
			'qualia' => [
				'toClass' => '\\App\\Models\\Qualia',
				'cardinality' => 'oneToMany',
				'keys' => 'idTypeInstance:idTypeInstance'
			],
			'templateElement' => [
				'toClass' => '\\App\\Models\\TemplateElement',
				'cardinality' => 'oneToMany',
				'keys' => 'idCoreType:idCoreType'
			],
			'udFeature' => [
				'toClass' => '\\App\\Models\\UdFeature',
				'cardinality' => 'oneToMany',
				'keys' => 'idTypeInstance:idTypeInstance'
			],
			'udRelation' => [
				'toClass' => '\\App\\Models\\UdRelation',
				'cardinality' => 'oneToMany',
				'keys' => 'idTypeInstance:idTypeInstance'
			]
		]
	];
}
