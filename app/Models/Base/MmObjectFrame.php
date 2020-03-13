<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class MmObjectFrame
 * 
 * @property int $idObjectFrameMM
 * @property int $frameNumber
 * @property int $x
 * @property int $y
 * @property int $width
 * @property int $height
 * @property int $blocked
 * @property int $idObjectMM
 * 
 * @property \App\Models\MmObject $mmObject
 *
 * @package App\Models\Base
 */

class MmObjectFrame extends \MBusinessModel
{
	public int $idObjectFrameMM; 
	public int $frameNumber; 
	public int $x; 
	public int $y; 
	public int $width; 
	public int $height; 
	public int $blocked; 
	public int $idObjectMM; 
	public \App\Models\MmObject $mmObject; 

	public function mmObject()
	{
		return $this->mmObject ?: $this->retrieveAssociation('mmObject'); 
	}
}
