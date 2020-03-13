<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:30 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class MmObject
 * 
 * @property int $idObjectMM
 * @property string $name
 * @property int $startFrame
 * @property int $endFrame
 * @property int $idAnnotationSetMM
 * @property int $idFrameElement
 * 
 * @property \App\Models\FrameElement $frameElement
 * @property \App\Models\MmAnnotationSet $mmAnnotationSet
 * @property Collection $mmObjectFrame
 *
 * @package App\Models\Base
 */

class MmObject extends \MBusinessModel
{
	public int $idObjectMM; 
	public string $name = '';
	public int $startFrame; 
	public int $endFrame; 
	public int $idAnnotationSetMM; 
	public int $idFrameElement; 
	public \App\Models\FrameElement $frameElement; 
	public \App\Models\MmAnnotationSet $mmAnnotationSet; 
	public Collection $mmObjectFrame; 

	public function frameElement()
	{
		return $this->frameElement ?: $this->retrieveAssociation('frameElement'); 
	}

	public function mmAnnotationSet()
	{
		return $this->mmAnnotationSet ?: $this->retrieveAssociation('mmAnnotationSet'); 
	}

	public function mmObjectFrame()
	{
		return $this->mmObjectFrame ?: $this->retrieveAssociation('mmObjectFrame'); 
	}
}
