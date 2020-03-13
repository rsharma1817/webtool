<?php

namespace App\Models;

class Paragraph extends \App\Models\Base\Paragraph
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
