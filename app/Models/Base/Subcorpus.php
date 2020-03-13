<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class Subcorpus
 * 
 * @property int $idSubCorpus
 * @property string $name
 * @property int $rank
 * @property int $idEntity
 * 
 * @property \App\Models\Entity $entity
 * @property Collection $annotationSet
 *
 * @package App\Models\Base
 */

class Subcorpus extends \MBusinessModel
{
	public int $idSubCorpus; 
	public string $name = '';
	public int $rank; 
	public int $idEntity; 
	public \App\Models\Entity $entity; 
	public Collection $annotationSet; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function annotationSet()
	{
		return $this->annotationSet ?: $this->retrieveAssociation('annotationSet'); 
	}
}
