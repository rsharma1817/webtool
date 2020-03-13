<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Map;

class AuthUserGroupMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\AuthUserGroup',
		'table' => 'auth_user_group',
		'primaryKey' => '',
		'attributes' => [
			'idUser' => [
				'column' => 'idUser',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'idGroup' => [
				'column' => 'idGroup',
				'type' => 'int'
			]
		],
		'associations' => [
			'authGroup' => [
				'toClass' => '\\App\\Models\\AuthGroup',
				'cardinality' => 'oneToOne',
				'keys' => 'idGroup:idGroup'
			],
			'authUser' => [
				'toClass' => '\\App\\Models\\AuthUser',
				'cardinality' => 'oneToOne',
				'keys' => 'idUser:idUser'
			]
		]
	];
}
