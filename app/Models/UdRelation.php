<?php

namespace App\Models;

class UdRelation extends \App\Models\Base\UdRelation
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
