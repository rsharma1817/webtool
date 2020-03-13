<?php

class MAuthDbMD5 extends MAuth
{

    public function authenticate($userId, $challenge, $response)
    {
        Manager::logMessage("[LOGIN] Authenticating $userId MD5");
        $login = NULL;

        try {
            $user = Manager::getModelMAD('user');
            $user->getByLogin($userId);
            mtrace("Authenticate userID = $userId");
            if ($user->validatePasswordMD5($challenge, $response)) {
                if (method_exists($user, 'getProfileAtual')) {
                    $profile = $user->getProfileAtual();
                    $user->getByProfile($profile);
                }
                $login = new MLogin($user);
                if (Manager::getOptions("dbsession")) {
                    $session = Manager::getModelMAD('session');
                    $session->lastAccess($login);
                    $session->registerIn($login);
                }
                $this->setLogin($login);
                $this->setLoginLogUserId($user->getId());
                $this->setLoginLog($login->getLogin());
                Manager::logMessage("[LOGIN] Authenticated $userId MD5");
                return true;
            } else {
                Manager::logMessage("[LOGIN] $userId NOT Authenticated MD5");
            }
        } catch (Exception $e) {
            Manager::logMessage("[LOGIN] $userId NOT Authenticated MD5 - " . $e->getMessage());
        }
        return false;
    }

    public function validate($userId, $challenge, $response)
    {
        $user = Manager::getModelMAD('user');
        $user = $user->getByLogin($userId);

        return $user->validatePasswordMD5($challenge, $response);
    }

}
