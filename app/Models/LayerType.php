<?php

namespace App\Models;

class LayerType extends \App\Models\Base\LayerType
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
