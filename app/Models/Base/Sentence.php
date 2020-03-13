<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class Sentence
 * 
 * @property int $idSentence
 * @property string $text
 * @property int $paragraphOrder
 * @property int $idParagraph
 * @property int $idLanguage
 * @property int $idEntity
 * 
 * @property \App\Models\Entity $entity
 * @property \App\Models\Language $language
 * @property \App\Models\Paragraph $paragraph
 * @property Collection $annotationSet
 * @property Collection $mmSentence
 *
 * @package App\Models\Base
 */

class Sentence extends \MBusinessModel
{
	public int $idSentence; 
	public string $text = '';
	public int $paragraphOrder; 
	public int $idParagraph; 
	public int $idLanguage; 
	public int $idEntity; 
	public \App\Models\Entity $entity; 
	public \App\Models\Language $language; 
	public \App\Models\Paragraph $paragraph; 
	public Collection $annotationSet; 
	public Collection $mmSentence; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function language()
	{
		return $this->language ?: $this->retrieveAssociation('language'); 
	}

	public function paragraph()
	{
		return $this->paragraph ?: $this->retrieveAssociation('paragraph'); 
	}

	public function annotationSet()
	{
		return $this->annotationSet ?: $this->retrieveAssociation('annotationSet'); 
	}

	public function mmSentence()
	{
		return $this->mmSentence ?: $this->retrieveAssociation('mmSentence'); 
	}
}
