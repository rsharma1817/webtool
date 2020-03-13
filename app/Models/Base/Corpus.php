<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class Corpus
 * 
 * @property int $idCorpus
 * @property int $idEntity
 * 
 * @property \App\Models\Entity $entity
 * @property Collection $document
 *
 * @package App\Models\Base
 */

class Corpus extends \MBusinessModel
{
	public int $idCorpus; 
	public int $idEntity; 
	public \App\Models\Entity $entity; 
	public Collection $document; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function document()
	{
		return $this->document ?: $this->retrieveAssociation('document'); 
	}
}
