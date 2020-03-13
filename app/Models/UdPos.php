<?php

namespace App\Models;

class UdPos extends \App\Models\Base\UdPos
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
