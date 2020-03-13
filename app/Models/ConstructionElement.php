<?php

namespace App\Models;

class ConstructionElement extends \App\Models\Base\ConstructionElement
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
