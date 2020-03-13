<?php

namespace App\Models;

class GenericLabel extends \App\Models\Base\GenericLabel
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
