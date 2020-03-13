<?php

namespace App\Models;

class MmSentence extends \App\Models\Base\MmSentence
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
