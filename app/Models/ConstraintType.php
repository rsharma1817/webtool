<?php

namespace App\Models;

class ConstraintType extends \App\Models\Base\ConstraintType
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
