<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class Lexeme
 * 
 * @property int $idLexeme
 * @property string $name
 * @property int $idPOS
 * @property int $idLanguage
 * @property int $idEntity
 * @property int $idUDPOS
 * 
 * @property \App\Models\Entity $entity
 * @property \App\Models\Language $language
 * @property \App\Models\Pos $pos
 * @property Collection $lexemeEntry
 * @property Collection $wordform
 *
 * @package App\Models\Base
 */

class Lexeme extends \MBusinessModel
{
	public int $idLexeme; 
	public string $name = '';
	public int $idPOS; 
	public int $idLanguage; 
	public int $idEntity; 
	public int $idUDPOS; 
	public \App\Models\Entity $entity; 
	public \App\Models\Language $language; 
	public \App\Models\Pos $pos; 
	public Collection $lexemeEntry; 
	public Collection $wordform; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function language()
	{
		return $this->language ?: $this->retrieveAssociation('language'); 
	}

	public function pos()
	{
		return $this->pos ?: $this->retrieveAssociation('pos'); 
	}

	public function lexemeEntry()
	{
		return $this->lexemeEntry ?: $this->retrieveAssociation('lexemeEntry'); 
	}

	public function wordform()
	{
		return $this->wordform ?: $this->retrieveAssociation('wordform'); 
	}
}
