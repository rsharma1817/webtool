<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class Pos
 * 
 * @property int $idPOS
 * @property string $POS
 * @property int $idEntity
 * 
 * @property \App\Models\Entity $entity
 * @property Collection $lemma
 * @property Collection $lexeme
 * @property Collection $posUdPos
 * @property Collection $UdPos
 *
 * @package App\Models\Base
 */

class Pos extends \MBusinessModel
{
	public int $idPOS; 
	public string $POS = '';
	public int $idEntity; 
	public \App\Models\Entity $entity; 
	public Collection $lemma; 
	public Collection $lexeme; 
	public Collection $posUdPos; 
	public Collection $UdPos; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function lemma()
	{
		return $this->lemma ?: $this->retrieveAssociation('lemma'); 
	}

	public function lexeme()
	{
		return $this->lexeme ?: $this->retrieveAssociation('lexeme'); 
	}

	public function posUdPos()
	{
		return $this->posUdPos ?: $this->retrieveAssociation('posUdPos'); 
	}

	public function udPos()
	{
		return $this->udPos ?: $this->retrieveAssociation('udPos'); 
	}
}
