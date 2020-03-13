<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class GenericLabel
 * 
 * @property int $idGenericLabel
 * @property string $name
 * @property string $definition
 * @property string $example
 * @property int $idEntity
 * @property int $idLanguage
 * 
 * @property \App\Models\Entity $entity
 * @property \App\Models\Language $language
 *
 * @package App\Models\Base
 */

class GenericLabel extends \MBusinessModel
{
	public int $idGenericLabel; 
	public string $name = '';
	public string $definition = '';
	public string $example = '';
	public int $idEntity; 
	public int $idLanguage; 
	public \App\Models\Entity $entity; 
	public \App\Models\Language $language; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function language()
	{
		return $this->language ?: $this->retrieveAssociation('language'); 
	}
}
