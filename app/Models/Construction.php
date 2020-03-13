<?php

namespace App\Models;

class Construction extends \App\Models\Base\Construction
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
