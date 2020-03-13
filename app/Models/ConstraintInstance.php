<?php

namespace App\Models;

class ConstraintInstance extends \App\Models\Base\ConstraintInstance
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
