<?php

namespace App\Models;

class EntityRelation extends \App\Models\Base\EntityRelation
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
