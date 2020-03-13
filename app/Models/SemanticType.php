<?php

namespace App\Models;

class SemanticType extends \App\Models\Base\SemanticType
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
