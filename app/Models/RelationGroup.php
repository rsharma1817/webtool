<?php

namespace App\Models;

class RelationGroup extends \App\Models\Base\RelationGroup
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
