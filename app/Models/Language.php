<?php

namespace App\Models;

class Language extends \App\Models\Base\Language
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
