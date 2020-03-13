<?php

namespace App\Models;

class Lemma extends \App\Models\Base\Lemma
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
