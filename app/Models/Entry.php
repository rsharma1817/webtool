<?php

namespace App\Models;

class Entry extends \App\Models\Base\Entry
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
