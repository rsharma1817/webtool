<?php

namespace database;

use Doctrine\DBAL\Logging\SQLLogger;
use Manager;

class MSQLLogger implements SQLLogger
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function startQuery($sql, array $params = null, array $types = null)
    {
        if (Manager::getLog()) {
            $log = '';
            if (count((array)$params)) {
                $log = '[';
                $i = 0;
                foreach ($params as $param) {
                    $log .= ($i++ ? ',' : '') . "(" . gettype($param) . ") " . substr($param, 0, 100);
                }
                $log .= ']';
            }
            Manager::getLog()->logSQL($sql . $log, $this->db);
        }
    }

    /**
     * Mark the last started query as stopped. This can be used for timing of queries.
     *
     * @return void
     */
    public function stopQuery()
    {

    }

}