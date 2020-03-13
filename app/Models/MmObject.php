<?php

namespace App\Models;

class MmObject extends \App\Models\Base\MmObject
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
