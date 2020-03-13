<?php

namespace App\Models;

class TemplateElement extends \App\Models\Base\TemplateElement
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
