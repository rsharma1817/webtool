<?php

namespace App\Models;

class Wordform extends \App\Models\Base\Wordform
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
