<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class UdPos
 * 
 * @property int $idUDPOS
 * @property string $POS
 * @property int $idEntity
 * 
 * @property \App\Models\Entity $entity
 * @property Collection $pos
 *
 * @package App\Models\Base
 */

class UdPos extends \MBusinessModel
{
	public int $idUDPOS; 
	public string $POS = '';
	public int $idEntity; 
	public \App\Models\Entity $entity; 
	public Collection $pos; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function pos()
	{
		return $this->pos ?: $this->retrieveAssociation('pos'); 
	}
}
