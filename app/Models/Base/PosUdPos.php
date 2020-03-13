<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class PosUdPos
 * 
 * @property int $idPOS
 * @property int $idUDPOS
 * 
 * @property \App\Models\Pos $pos
 * @property \App\Models\UdPos $udPos
 *
 * @package App\Models\Base
 */

class PosUdPos extends \MBusinessModel
{
	public int $idPOS; 
	public int $idUDPOS; 
	public \App\Models\Pos $pos; 
	public \App\Models\UdPos $udPos; 

	public function pos()
	{
		return $this->pos ?: $this->retrieveAssociation('pos'); 
	}

	public function udPos()
	{
		return $this->udPos ?: $this->retrieveAssociation('udPos'); 
	}
}
