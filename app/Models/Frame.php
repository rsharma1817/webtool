<?php

namespace App\Models;

class Frame extends \App\Models\Base\Frame
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
