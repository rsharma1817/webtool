<?php

namespace App\Models;

class AsComments extends \App\Models\Base\AsComments
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
