<?php

namespace App\Models;

class AuthUserGroup extends \App\Models\Base\AuthUserGroup
{
	public static function config()
	{
		return [
            'log' => [],
            'validators' => [],
            'converters' => []
        ];
	}
}
