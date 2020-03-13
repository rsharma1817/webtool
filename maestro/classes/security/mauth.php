<?php

class MAuth
{

    private $login;  // objeto Login
    public $idUser; // iduser do usuario corrente
    public $module; // authentication module;

    public function __construct()
    {
        $this->module = Manager::$conf['login']['module'];
    }

    public function setLogin($login = false)
    {
        $this->login = $login;
        $this->updateSessionLogin();
        $this->idUser = ($this->login instanceof MLogin ? $this->login->getIdUser() : NULL);
    }

    public function setLoginLogUserId($userId)
    {
        $_SESSION['loginLogUserId'] = $userId;
        // mdump("setLoginLogUserId " . $userId);
    }

    public function getLoginLogUserId()
    {
        // mdump("getLoginLogUserId " . $_SESSION['loginLogUserId']);
        return $_SESSION['loginLogUserId'];
    }

    public function setLoginLog($login)
    {
        $_SESSION['loginLog'] = $login;
    }

    public function getLoginLog()
    {
        return $_SESSION['loginLog'];
    }


    public function getLogin()
    {
        if ($this->login instanceof MLogin) {
            return $this->login;
        } else {
            $login = Manager::getSession()->getValue('__sessionLogin');
            if ($login instanceof MLogin) {
                $this->login = $login;
                return $login;
            }
        }
        return new MLogin();
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function checkLogin()
    {
        Manager::logMessage('[LOGIN] Running CheckLogin');

// if not checking logins, we are done
        if ((!MUtil::getBooleanValue(Manager::$conf['login']['check']))) {
            Manager::logMessage('[LOGIN] I am not checking login today...');
            return true;
        }

// if we have already a login, assume it is valid and return
        if ($this->login instanceof MLogin) {
            Manager::logMessage('[LOGIN] Using existing login:' . $this->login->getLogin());
            return true;
        }

// we have a session login?
        $session = Manager::getSession();
        $login = $session->getValue('__sessionLogin');
        if ($login instanceof MLogin) {
            if ($login->getLogin()) {
                Manager::logMessage('[LOGIN] Using session login: ' . $login->getLogin());
                //$this->setLogin($login);
                return true;
            }
        }

        Manager::logMessage('[LOGIN] No Login but Login required!');
        return false;
    }

    public function authenticate($userId, $challenge, $response)
    {
        // execute in inherited classes
        return false;
    }

    public function isLogged()
    {
        if ($this->login instanceof MLogin) {
            return ($this->login->getLogin() != NULL);
        } // else {
        //    $login = Manager::getSession()->getValue('__sessionLogin');
        //    if ($login instanceof MLogin) {
        //        return ($login->getLogin() != NULL);
        //    }
        //}
        return false;
    }

    public function logout($forced = '')
    {
        $this->setLogin(NULL);
        Manager::getSession()->destroy();
    }

    private function updateSessionLogin()
    {
        Manager::getSession()->setValue('__sessionLogin', $this->login);
    }

    public function updateSessionLoginIfIsUserLogged(PersistentObject $user)
    {
        if ($this->login->isUserLogged($user)) {
            $this->login->setUser($user);
            $this->updateSessionLogin();
        }
    }

}
