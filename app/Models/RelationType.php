<?php

namespace App\Models;

class RelationType extends \App\Models\Base\RelationType
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
