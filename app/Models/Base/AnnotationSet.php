<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class AnnotationSet
 * 
 * @property int $idAnnotationSet
 * @property int $idSubCorpus
 * @property int $idSentence
 * @property int $idAnnotationStatus
 * @property int $idEntity
 * 
 * @property \App\Models\Entity $entity
 * @property \App\Models\Sentence $sentence
 * @property \App\Models\Subcorpus $subcorpus
 * @property \App\Models\TypeInstance $typeInstance
 * @property Collection $asComments
 * @property Collection $layer
 * @property Collection $mmAnnotationSet
 *
 * @package App\Models\Base
 */

class AnnotationSet extends \MBusinessModel
{
	public int $idAnnotationSet; 
	public int $idSubCorpus; 
	public int $idSentence; 
	public int $idAnnotationStatus; 
	public int $idEntity; 
	public \App\Models\Entity $entity; 
	public \App\Models\Sentence $sentence; 
	public \App\Models\Subcorpus $subcorpus; 
	public \App\Models\TypeInstance $typeInstance; 
	public Collection $asComments; 
	public Collection $layer; 
	public Collection $mmAnnotationSet; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function sentence()
	{
		return $this->sentence ?: $this->retrieveAssociation('sentence'); 
	}

	public function subcorpus()
	{
		return $this->subcorpus ?: $this->retrieveAssociation('subcorpus'); 
	}

	public function typeInstance()
	{
		return $this->typeInstance ?: $this->retrieveAssociation('typeInstance'); 
	}

	public function asComments()
	{
		return $this->asComments ?: $this->retrieveAssociation('asComments'); 
	}

	public function layer()
	{
		return $this->layer ?: $this->retrieveAssociation('layer'); 
	}

	public function mmAnnotationSet()
	{
		return $this->mmAnnotationSet ?: $this->retrieveAssociation('mmAnnotationSet'); 
	}
}
