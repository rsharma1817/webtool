<?php

namespace App\Models;

class MmDocument extends \App\Models\Base\MmDocument
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
