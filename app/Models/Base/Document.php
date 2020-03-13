<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class Document
 * 
 * @property int $idDocument
 * @property string $author
 * @property int $idGenre
 * @property int $idCorpus
 * @property int $idEntity
 * 
 * @property \App\Models\Corpus $corpus
 * @property \App\Models\Entity $entity
 * @property \App\Models\Genre $genre
 * @property Collection $mmDocument
 * @property Collection $paragraph
 *
 * @package App\Models\Base
 */

class Document extends \MBusinessModel
{
	public int $idDocument; 
	public string $author = '';
	public int $idGenre; 
	public int $idCorpus; 
	public int $idEntity; 
	public \App\Models\Corpus $corpus; 
	public \App\Models\Entity $entity; 
	public \App\Models\Genre $genre; 
	public Collection $mmDocument; 
	public Collection $paragraph; 

	public function corpus()
	{
		return $this->corpus ?: $this->retrieveAssociation('corpus'); 
	}

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function genre()
	{
		return $this->genre ?: $this->retrieveAssociation('genre'); 
	}

	public function mmDocument()
	{
		return $this->mmDocument ?: $this->retrieveAssociation('mmDocument'); 
	}

	public function paragraph()
	{
		return $this->paragraph ?: $this->retrieveAssociation('paragraph'); 
	}
}
