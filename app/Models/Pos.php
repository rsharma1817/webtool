<?php

namespace App\Models;

class Pos extends \App\Models\Base\Pos
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
