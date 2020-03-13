<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class MmAnnotationSet
 * 
 * @property int $idAnnotationSetMM
 * @property string $annotationPath
 * @property int $idSentenceMM
 * @property int $idAnnotationSet
 * @property int $idEntity
 * 
 * @property \App\Models\AnnotationSet $annotationSet
 * @property \App\Models\Entity $entity
 * @property \App\Models\MmSentence $mmSentence
 * @property Collection $mmObject
 *
 * @package App\Models\Base
 */

class MmAnnotationSet extends \MBusinessModel
{
	public int $idAnnotationSetMM; 
	public string $annotationPath = '';
	public int $idSentenceMM; 
	public int $idAnnotationSet; 
	public int $idEntity; 
	public \App\Models\AnnotationSet $annotationSet; 
	public \App\Models\Entity $entity; 
	public \App\Models\MmSentence $mmSentence; 
	public Collection $mmObject; 

	public function annotationSet()
	{
		return $this->annotationSet ?: $this->retrieveAssociation('annotationSet'); 
	}

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function mmSentence()
	{
		return $this->mmSentence ?: $this->retrieveAssociation('mmSentence'); 
	}

	public function mmObject()
	{
		return $this->mmObject ?: $this->retrieveAssociation('mmObject'); 
	}
}
