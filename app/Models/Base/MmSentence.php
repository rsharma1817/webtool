<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class MmSentence
 * 
 * @property int $idSentenceMM
 * @property string $startTimestamp
 * @property string $endTimestamp
 * @property int $idSentence
 * 
 * @property \App\Models\Sentence $sentence
 * @property Collection $mmAnnotationSet
 *
 * @package App\Models\Base
 */

class MmSentence extends \MBusinessModel
{
	public int $idSentenceMM; 
	public string $startTimestamp = '';
	public string $endTimestamp = '';
	public int $idSentence; 
	public \App\Models\Sentence $sentence; 
	public Collection $mmAnnotationSet; 

	public function sentence()
	{
		return $this->sentence ?: $this->retrieveAssociation('sentence'); 
	}

	public function mmAnnotationSet()
	{
		return $this->mmAnnotationSet ?: $this->retrieveAssociation('mmAnnotationSet'); 
	}
}
