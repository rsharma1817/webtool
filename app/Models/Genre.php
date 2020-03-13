<?php

namespace App\Models;

class Genre extends \App\Models\Base\Genre
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
