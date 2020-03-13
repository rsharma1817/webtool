<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class Language
 * 
 * @property int $idLanguage
 * @property string $language
 * @property string $description
 * 
 * @property Collection $construction
 * @property Collection $entry
 * @property Collection $genericLabel
 * @property Collection $lemma
 * @property Collection $lexeme
 * @property Collection $sentence
 *
 * @package App\Models\Base
 */

class Language extends \MBusinessModel
{
	public int $idLanguage; 
	public string $language = '';
	public string $description = '';
	public Collection $construction; 
	public Collection $entry; 
	public Collection $genericLabel; 
	public Collection $lemma; 
	public Collection $lexeme; 
	public Collection $sentence; 

	public function construction()
	{
		return $this->construction ?: $this->retrieveAssociation('construction'); 
	}

	public function entry()
	{
		return $this->entry ?: $this->retrieveAssociation('entry'); 
	}

	public function genericLabel()
	{
		return $this->genericLabel ?: $this->retrieveAssociation('genericLabel'); 
	}

	public function lemma()
	{
		return $this->lemma ?: $this->retrieveAssociation('lemma'); 
	}

	public function lexeme()
	{
		return $this->lexeme ?: $this->retrieveAssociation('lexeme'); 
	}

	public function sentence()
	{
		return $this->sentence ?: $this->retrieveAssociation('sentence'); 
	}
}
