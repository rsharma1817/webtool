<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class Wordform
 * 
 * @property int $idWordForm
 * @property string $form
 * @property int $idLexeme
 * @property int $idEntity
 * 
 * @property \App\Models\Entity $entity
 * @property \App\Models\Lexeme $lexeme
 *
 * @package App\Models\Base
 */

class Wordform extends \MBusinessModel
{
	public int $idWordForm; 
	public string $form = '';
	public int $idLexeme; 
	public int $idEntity; 
	public \App\Models\Entity $entity; 
	public \App\Models\Lexeme $lexeme; 

	public function entity()
	{
		return $this->entity ?: $this->retrieveAssociation('entity'); 
	}

	public function lexeme()
	{
		return $this->lexeme ?: $this->retrieveAssociation('lexeme'); 
	}
}
