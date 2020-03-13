<?php

namespace App\Models;

class GenreType extends \App\Models\Base\GenreType
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
