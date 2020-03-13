<?php

namespace App\Models;

class Concept extends \App\Models\Base\Concept
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
