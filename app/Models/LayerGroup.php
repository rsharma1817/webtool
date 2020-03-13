<?php

namespace App\Models;

class LayerGroup extends \App\Models\Base\LayerGroup
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
