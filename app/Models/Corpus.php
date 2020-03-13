<?php

namespace App\Models;

class Corpus extends \App\Models\Base\Corpus
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
