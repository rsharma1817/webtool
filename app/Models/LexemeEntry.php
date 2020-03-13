<?php

namespace App\Models;

class LexemeEntry extends \App\Models\Base\LexemeEntry
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
