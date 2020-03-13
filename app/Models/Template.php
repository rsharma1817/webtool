<?php

namespace App\Models;

class Template extends \App\Models\Base\Template
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
