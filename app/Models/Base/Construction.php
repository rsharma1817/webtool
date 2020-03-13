<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class Construction
 * 
 * @property int $idConstruction
 * @property bool $abstract
 * @property bool $active
 * @property int $idLanguage
 * @property int $idEntity
 * 
 * @property \App\Models\Entity $entity
 * @property \App\Models\Language $language
 * @property Collection $constructionElement
 *
 * @package App\Models\Base
 */

class Construction extends \MBusinessModel
{
	public int $idConstruction; 
	public bool $abstract = false;
	public bool $active = false;
	public int $idLanguage; 
	public int $idEntity; 
	public \App\Models\Entity $entity; 
	public \App\Models\Language $language; 
	public Collection $constructionElement; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function language()
	{
		return $this->language ?: $this->retrieveAssociation('language'); 
	}

	public function constructionElement()
	{
		return $this->constructionElement ?: $this->retrieveAssociation('constructionElement'); 
	}
}
