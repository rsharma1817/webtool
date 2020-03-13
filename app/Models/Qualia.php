<?php

namespace App\Models;

class Qualia extends \App\Models\Base\Qualia
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
