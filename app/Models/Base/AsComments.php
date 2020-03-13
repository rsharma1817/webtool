<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class AsComments
 * 
 * @property int $idASComments
 * @property string $ExtraThematicFE
 * @property string $ExtraThematicFEOther
 * @property string $Comment
 * @property string $Construction
 * @property int $idAnnotationSet
 * 
 * @property \App\Models\AnnotationSet $annotationSet
 *
 * @package App\Models\Base
 */

class AsComments extends \MBusinessModel
{
	public int $idASComments; 
	public string $ExtraThematicFE = '';
	public string $ExtraThematicFEOther = '';
	public string $Comment = '';
	public string $Construction = '';
	public int $idAnnotationSet; 
	public \App\Models\AnnotationSet $annotationSet; 

	public function annotationSet()
	{
		return $this->annotationSet ?: $this->retrieveAssociation('annotationSet'); 
	}
}
