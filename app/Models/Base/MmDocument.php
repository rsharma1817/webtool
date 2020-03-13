<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class MmDocument
 * 
 * @property int $idDocumentMM
 * @property string $audioPath
 * @property string $visualPath
 * @property string $alignPath
 * @property int $idDocument
 * 
 * @property \App\Models\Document $document
 *
 * @package App\Models\Base
 */

class MmDocument extends \MBusinessModel
{
	public int $idDocumentMM; 
	public string $audioPath = '';
	public string $visualPath = '';
	public string $alignPath = '';
	public int $idDocument; 
	public \App\Models\Document $document; 

	public function document()
	{
		return $this->document ?: $this->retrieveAssociation('document'); 
	}
}
