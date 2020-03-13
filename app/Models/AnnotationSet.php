<?php

namespace App\Models;

class AnnotationSet extends \App\Models\Base\AnnotationSet
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
