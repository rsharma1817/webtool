<?php

namespace App\Manager;

class Manager
{
    static public function getData() {
        $data = request();
        return (object)$data->all();
    }

    static public function getParams($names = []) {
        $data = self::getData();
        $params = [];
        foreach($names as $name) {
            $params[$name] = $data->$name ?? '';
        }
        return (object)$params;
    }

}
