<?php

use fnbr\models\Base;

class webtoolFilter extends MFilter {

    public function preProcess() {
        $data = Manager::getData();
        $idLanguage = $data->lang;
        if ($idLanguage == '') {
            $idLanguage = Manager::getSession()->idLanguage;
            if ($idLanguage == '') {
                if (Manager::isLogged()) {
                    $login = Manager::getLogin();
                    $idLanguage = $login->getUser()->getConfigData('fnbrIdLanguage');
                }
                if ($idLanguage == '') {
                    $idLanguage = 1;
                }
            }
        }
        Manager::getSession()->idLanguage = $idLanguage;
        $db = $data->datasource ? : Manager::getConf('fnbr.db');
        Manager::setConf('fnbr.db', $db);
        //Manager::setConf('options.language', Base::languages()[$idLanguage]);
    }

}

