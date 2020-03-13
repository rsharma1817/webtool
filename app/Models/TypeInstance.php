<?php

namespace App\Models;

class TypeInstance extends \App\Models\Base\TypeInstance
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
