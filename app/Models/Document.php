<?php

namespace App\Models;

class Document extends \App\Models\Base\Document
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
