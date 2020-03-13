<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class LexemeEntry
 * 
 * @property int $idLexemeEntry
 * @property int $lexemeOrder
 * @property bool $breakBefore
 * @property bool $headWord
 * @property int $idLexeme
 * @property int $idLemma
 * 
 * @property \App\Models\Lemma $lemma
 * @property \App\Models\Lexeme $lexeme
 *
 * @package App\Models\Base
 */

class LexemeEntry extends \MBusinessModel
{
	public int $idLexemeEntry; 
	public int $lexemeOrder; 
	public bool $breakBefore = false;
	public bool $headWord = false;
	public int $idLexeme; 
	public int $idLemma; 
	public \App\Models\Lemma $lemma; 
	public \App\Models\Lexeme $lexeme; 

	public function lemma()
	{
		return $this->lemma ?: $this->retrieveAssociation('lemma'); 
	}

	public function lexeme()
	{
		return $this->lexeme ?: $this->retrieveAssociation('lexeme'); 
	}
}
