<?php

namespace App\Models;

class Lexeme extends \App\Models\Base\Lexeme
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
