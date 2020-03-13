<?php

namespace App\Models;

class UdFeature extends \App\Models\Base\UdFeature
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
