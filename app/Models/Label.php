<?php

namespace App\Models;

class Label extends \App\Models\Base\Label
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
