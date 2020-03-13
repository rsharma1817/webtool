<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class Timeline
 * 
 * @property int $idTimeline
 * @property int $numOrder
 * @property \MTimestamp $tlDateTime
 * @property string $author
 * @property string $operation
 * @property int $idEntity
 * 
 * @property \App\Models\Entity $entity
 *
 * @package App\Models\Base
 */

class Timeline extends \MBusinessModel
{
	public int $idTimeline; 
	public int $numOrder; 
	public \MTimestamp $tlDateTime; 
	public string $author = '';
	public string $operation = '';
	public int $idEntity; 
	public \App\Models\Entity $entity; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}
}
