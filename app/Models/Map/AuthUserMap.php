<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Map;

class AuthUserMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\AuthUser',
		'table' => 'auth_user',
		'primaryKey' => 'idUser',
		'attributes' => [
			'idUser' => [
				'column' => 'idUser',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'login' => [
				'column' => 'login',
				'type' => 'string'
			],
			'pwd' => [
				'column' => 'pwd',
				'type' => 'string'
			],
			'passMD5' => [
				'column' => 'passMD5',
				'type' => 'string'
			],
			'config' => [
				'column' => 'config',
				'type' => 'string'
			],
			'active' => [
				'column' => 'active',
				'type' => 'bool'
			],
			'status' => [
				'column' => 'status',
				'type' => 'string'
			],
			'name' => [
				'column' => 'name',
				'type' => 'string'
			],
			'email' => [
				'column' => 'email',
				'type' => 'string'
			],
			'nick' => [
				'column' => 'nick',
				'type' => 'string'
			],
			'auth0IdUser' => [
				'column' => 'auth0IdUser',
				'type' => 'string'
			],
			'auth0CreatedAt' => [
				'column' => 'auth0CreatedAt',
				'type' => 'string'
			],
			'lastLogin' => [
				'column' => 'lastLogin',
				'type' => 'timestamp'
			]
		],
		'associations' => [
			'authUserGroup' => [
				'toClass' => '\\App\\Models\\AuthUserGroup',
				'cardinality' => 'oneToMany',
				'keys' => 'idUser:idUser'
			],
			'authGroup' => [
				'toClass' => '\\App\\Models\\AuthGroup',
				'cardinality' => 'manyToMany',
				'associative' => 'auth_user_group'
			]
		]
	];
}
