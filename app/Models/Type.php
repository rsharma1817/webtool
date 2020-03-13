<?php

namespace App\Models;

class Type extends \App\Models\Base\Type
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
