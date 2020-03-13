<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Map;

class AuthGroupMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\AuthGroup',
		'table' => 'auth_group',
		'primaryKey' => 'idGroup',
		'attributes' => [
			'idGroup' => [
				'column' => 'idGroup',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'name' => [
				'column' => 'name',
				'type' => 'string'
			],
			'description' => [
				'column' => 'description',
				'type' => 'string'
			]
		],
		'associations' => [
			'authUserGroup' => [
				'toClass' => '\\App\\Models\\AuthUserGroup',
				'cardinality' => 'oneToMany',
				'keys' => 'idGroup:idGroup'
			],
			'authUser' => [
				'toClass' => '\\App\\Models\\AuthUser',
				'cardinality' => 'manyToMany',
				'associative' => 'auth_user_group'
			]
		]
	];
}
