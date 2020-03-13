<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class AuthUserGroup
 * 
 * @property int $idUser
 * @property int $idGroup
 * 
 * @property \App\Models\AuthGroup $authGroup
 * @property \App\Models\AuthUser $authUser
 *
 * @package App\Models\Base
 */

class AuthUserGroup extends \MBusinessModel
{
	public int $idUser; 
	public int $idGroup; 
	public \App\Models\AuthGroup $authGroup; 
	public \App\Models\AuthUser $authUser; 

	public function authGroup()
	{
		return $this->authGroup ?: $this->retrieveAssociation('authGroup'); 
	}

	public function authUser()
	{
		return $this->authUser ?: $this->retrieveAssociation('authUser'); 
	}
}
