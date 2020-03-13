<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class Lu
 * 
 * @property int $idLU
 * @property string $name
 * @property string $senseDescription
 * @property bool $active
 * @property int $importNum
 * @property int $incorporatedFE
 * @property int $bff
 * @property string $bffOther
 * @property int $idEntity
 * @property int $idLemma
 * @property int $idFrame
 * 
 * @property \App\Models\Entity $entity
 * @property \App\Models\Frame $frame
 * @property \App\Models\Lemma $lemma
 *
 * @package App\Models\Base
 */

class Lu extends \MBusinessModel
{
	public int $idLU; 
	public string $name = '';
	public string $senseDescription = '';
	public bool $active = false;
	public int $importNum; 
	public int $incorporatedFE; 
	public int $bff; 
	public string $bffOther = '';
	public int $idEntity; 
	public int $idLemma; 
	public int $idFrame; 
	public \App\Models\Entity $entity; 
	public \App\Models\Frame $frame; 
	public \App\Models\Lemma $lemma; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function frame()
	{
		return $this->frame ?: $this->retrieveAssociation('frame'); 
	}

	public function lemma()
	{
		return $this->lemma ?: $this->retrieveAssociation('lemma'); 
	}
}
