<?php

namespace App\Models;

class EntityDomain extends \App\Models\Base\EntityDomain
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
