<?php

namespace App\Models;

class Sentence extends \App\Models\Base\Sentence
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
