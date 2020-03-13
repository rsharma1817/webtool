<?php

namespace App\Models;

class Entity extends \App\Models\Base\Entity
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
