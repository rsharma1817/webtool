<?php

namespace App\Models;

class Property extends \App\Models\Base\Property
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
