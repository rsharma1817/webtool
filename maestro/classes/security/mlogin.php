<?php

class MLogin
{

    private $login;
    public $time;
    private $name;
    private $userData;
    private $idUser;
    private $profile;
    private $isAdmin;
    private $idSession;
    private $rights;
    private $groups;
    private $idPerson;
    private $lastAccess;
    private $weakPass;

    public function __construct($user = '', $name = '', $idUser = '')
    {
        if ($user instanceof PersistentObject) { // it can be a User object
            $this->setUser($user);
        } else { // $user is the login string
            $this->login = $user;
            $this->name = $name;
            $this->idUser = $idUser;
            $this->isAdmin = false;
        }
        $this->time = time();
    }

    public function isUserLogged(PersistentObject $user)
    {
        return $this->login == $user->login;
    }

    public function setUser($user)
    {
        $this->login = $user->login;
        if (method_exists($user, 'getForRegisterLogin')) {
            $user->getForRegisterLogin();
        }
        if (method_exists($user, 'getProfile')) {
            $this->profile = $user->getProfile();
        }
        $this->name = $user->name;
        $this->idUser = $user->idUser;
        $this->setGroups($user->getArrayGroups());
        //$this->setRights($user->getRights());
        $this->weakPass = $user->weakPassword();
        $this->weakPass = false;
    }

    public function setProfile($user, $profile)
    {
        $this->profile = $profile;
        $this->name = $user->name;
        $this->idUser = $user->idUser;
        $this->setGroups($user->getArrayGroups($profile));
        //$this->setRights($user->getRights($profile));
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getProfile()
    {
        return $this->profile;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function getUserData($module)
    {
        return $this->userData[$module];
    }

    public function setUserData($module, $data)
    {
        $this->userData[$module] = $data;
    }

    public function setRights($rights)
    {
        $this->rights = $rights;
    }

    public function getRights($transaction = '')
    {
        if ($transaction) {
            return array_key_exists($transaction, $this->rights) ? $this->rights[$transaction] : null;
        }
        return $this->rights;
    }

    public function setGroups($groups)
    {
        $this->groups = $groups;
        $this->isAdmin(array_key_exists('ADMIN', $groups));
    }

    public function getGroups()
    {
        return $this->groups;
    }

    public function isAdmin($isAdmin = null)
    {
        if ($isAdmin !== NULL) {
            $this->isAdmin = $isAdmin;
        }
        return $this->isAdmin;
    }

    public function isMemberOf($group)
    {
        return Manager::getPerms()->isMemberOf($group);
    }

    public function isWeakPassword()
    {
        return $this->weakPass;
    }

    public function setIdPerson($idPerson)
    {
        $this->idPerson = $idPerson;
    }

    public function setLastAccess($data)
    {
        $this->lastAccess->tsIn = $data->tsIn;
        $this->lastAccess->tsOut = $data->tsOut;
        $this->lastAccess->remoteAddr = $data->remoteAddr;
    }

    public function isModuleAdmin($module)
    {
        $group = 'ADMIN' . strtoupper($module);
        return array_key_exists($group, $this->groups);
    }

    public function getUser()
    {
        $cacheHit = isset($this->user)
            && is_a($this->user, 'PersistentObject')
            && $this->user->getId() == $this->idUser;

        if (!$cacheHit) {
            $this->user = \Manager::getModelMAD('user', $this->idUser);
        }

        return $this->user;
    }

    /**
     * Método usado para informar o que deve ser serializado.
     * A propriedade user é ignorada para evitar problemas com a serialização antes do carregamento da classe.
     * @return array
     */
    public function __sleep()
    {
        $vars = get_object_vars($this);
        unset($vars['user']);

        return array_keys($vars);
    }

}
