<?php

namespace App\Models;

class AuthGroup extends \App\Models\Base\AuthGroup
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
