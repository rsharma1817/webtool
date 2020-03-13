<?php

namespace App\Models;

class Layer extends \App\Models\Base\Layer
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
