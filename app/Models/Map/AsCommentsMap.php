<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Map;

class AsCommentsMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\AsComments',
		'table' => '',
		'primaryKey' => 'idASComments',
		'attributes' => [
			'idASComments' => [
				'column' => 'idASComments',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'ExtraThematicFE' => [
				'column' => 'ExtraThematicFE',
				'type' => 'string'
			],
			'ExtraThematicFEOther' => [
				'column' => 'ExtraThematicFEOther',
				'type' => 'string'
			],
			'Comment' => [
				'column' => 'Comment',
				'type' => 'string'
			],
			'Construction' => [
				'column' => 'Construction',
				'type' => 'string'
			],
			'idAnnotationSet' => [
				'column' => 'idAnnotationSet',
				'type' => 'int'
			]
		],
		'associations' => [
			'annotationSet' => [
				'toClass' => '\\App\\Models\\AnnotationSet',
				'cardinality' => 'oneToOne',
				'keys' => 'idAnnotationSet:idAnnotationSet'
			]
		]
	];
}
