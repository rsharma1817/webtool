<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class Genre
 * 
 * @property int $idGenre
 * @property int $idGenreType
 * @property int $idEntity
 * 
 * @property \App\Models\Entity $entity
 * @property \App\Models\GenreType $genreType
 * @property Collection $document
 *
 * @package App\Models\Base
 */

class Genre extends \MBusinessModel
{
	public int $idGenre; 
	public int $idGenreType; 
	public int $idEntity; 
	public \App\Models\Entity $entity; 
	public \App\Models\GenreType $genreType; 
	public Collection $document; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function genreType()
	{
		return $this->genreType ?: $this->retrieveAssociation('genreType'); 
	}

	public function document()
	{
		return $this->document ?: $this->retrieveAssociation('document'); 
	}
}
