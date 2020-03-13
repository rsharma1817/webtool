<?php

namespace App\Models;

class Domain extends \App\Models\Base\Domain
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
