<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class Entry
 * 
 * @property int $idEntry
 * @property string $entry
 * @property string $name
 * @property string $description
 * @property string $nick
 * @property int $idLanguage
 * @property int $idEntity
 * 
 * @property \App\Models\Entity $entity
 * @property \App\Models\Language $language
 *
 * @package App\Models\Base
 */

class Entry extends \MBusinessModel
{
	public int $idEntry; 
	public string $entry = '';
	public string $name = '';
	public string $description = '';
	public string $nick = '';
	public int $idLanguage; 
	public int $idEntity; 
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
