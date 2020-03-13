<?php

namespace App\Models;

class MmAnnotationSet extends \App\Models\Base\MmAnnotationSet
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
