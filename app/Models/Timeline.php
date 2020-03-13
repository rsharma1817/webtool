<?php

namespace App\Models;

class Timeline extends \App\Models\Base\Timeline
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
