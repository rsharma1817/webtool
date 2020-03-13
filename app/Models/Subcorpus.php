<?php

namespace App\Models;

class Subcorpus extends \App\Models\Base\Subcorpus
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
