<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class GenreType
 * 
 * @property int $idGenreType
 * @property int $idEntity
 * 
 * @property \App\Models\Entity $entity
 * @property Collection $genre
 *
 * @package App\Models\Base
 */

class GenreType extends \MBusinessModel
{
	public int $idGenreType; 
	public int $idEntity; 
	public \App\Models\Entity $entity; 
	public Collection $genre; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function genre()
	{
		return $this->genre ?: $this->retrieveAssociation('genre'); 
	}
}
