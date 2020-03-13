<?php

namespace App\Models;

class PosUdPos extends \App\Models\Base\PosUdPos
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
