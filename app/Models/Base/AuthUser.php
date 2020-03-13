<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class AuthUser
 * 
 * @property int $idUser
 * @property string $login
 * @property string $pwd
 * @property string $passMD5
 * @property string $config
 * @property bool $active
 * @property string $status
 * @property string $name
 * @property string $email
 * @property string $nick
 * @property string $auth0IdUser
 * @property string $auth0CreatedAt
 * @property \MTimestamp $lastLogin
 * 
 * @property Collection $authUserGroup
 * @property Collection $AuthGroup
 *
 * @package App\Models\Base
 */

class AuthUser extends \MBusinessModel
{
	public int $idUser; 
	public string $login = '';
	public string $pwd = '';
	public string $passMD5 = '';
	public string $config = '';
	public bool $active = false;
	public string $status = '';
	public string $name = '';
	public string $email = '';
	public string $nick = '';
	public string $auth0IdUser = '';
	public string $auth0CreatedAt = '';
	public \MTimestamp $lastLogin; 
	public Collection $authUserGroup; 
	public Collection $AuthGroup; 

	public function authUserGroup()
	{
		return $this->authUserGroup ?: $this->retrieveAssociation('authUserGroup'); 
	}

	public function authGroup()
	{
		return $this->authGroup ?: $this->retrieveAssociation('authGroup'); 
	}
}
