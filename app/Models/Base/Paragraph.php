<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class Paragraph
 * 
 * @property int $idParagraph
 * @property int $documentOrder
 * @property int $idDocument
 * 
 * @property \App\Models\Document $document
 * @property Collection $sentence
 *
 * @package App\Models\Base
 */

class Paragraph extends \MBusinessModel
{
	public int $idParagraph; 
	public int $documentOrder; 
	public int $idDocument; 
	public \App\Models\Document $document; 
	public Collection $sentence; 

	public function document()
	{
		return $this->document ?: $this->retrieveAssociation('document'); 
	}

	public function sentence()
	{
		return $this->sentence ?: $this->retrieveAssociation('sentence'); 
	}
}
