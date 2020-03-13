<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class AuthGroup
 * 
 * @property int $idGroup
 * @property string $name
 * @property string $description
 * 
 * @property Collection $authUserGroup
 * @property Collection $AuthUser
 *
 * @package App\Models\Base
 */

class AuthGroup extends \MBusinessModel
{
	public int $idGroup; 
	public string $name = '';
	public string $description = '';
	public Collection $authUserGroup; 
	public Collection $AuthUser; 

	public function authUserGroup()
	{
		return $this->authUserGroup ?: $this->retrieveAssociation('authUserGroup'); 
	}

	public function authUser()
	{
		return $this->authUser ?: $this->retrieveAssociation('authUser'); 
	}
}
