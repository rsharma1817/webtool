<?php

class MLog
{


    private $errorLog;
    private $SQLLog;
    private $home;
    private $isLogging;
    private $level;
    private $handler;
    private $port;
    private $socket;
    private $host;
    public $content;

    public function __construct()
    {
        $this->home = $this->getOption('path');
        $this->level = $this->getOption('level');
        $this->handler = $this->getOption('handler');
        $this->port = $this->getOption('port');

        if (empty($this->host)) {
            $this->host = $_SERVER['REMOTE_ADDR'];
        }
    }

    private function getOption($option)
    {
        $conf = Manager::$conf['logs'];
        return array_key_exists($option, $conf) ? $conf[$option] : null;
    }

    public function setLevel($level)
    {
        $this->level = $level;
    }

    public function setLog($logName)
    {
        Manager::getInstance()->assert($logName, 'Manager::setLog: Database configuration [name] is empty!');
        $this->errorLog = $this->getLogFileName("$logName-error");
        $this->SQLLog = $this->getLogFileName("$logName-sql");
    }

    public function logSQL($sql, $db, $force = false)
    {
        if ($this->level < 2) {
            return;
        }

        // junta multiplas linhas em uma so
        $sql = preg_replace("/\n+ */", " ", $sql);
        $sql = preg_replace("/ +/", " ", $sql);

        // elimina espaços no início e no fim do comando SQL
        $sql = trim($sql);

        // troca aspas " em ""
        $sql = str_replace('"', '""', $sql);

        // data e horas no formato "dd/mes/aaaa:hh:mm:ss"
        $dts = Manager::getSysTime();

        $cmd = "/(SELECT|INSERT|DELETE|UPDATE|ALTER|CREATE|BEGIN|START|END|COMMIT|ROLLBACK|GRANT|REVOKE)(.*)/";

        $conf = $db->getName();
        $ip = substr($this->host . '        ', 0, 15);
        $login = Manager::getLogin();
        $uid = sprintf("%-10s", ($login ? $login->getLogin() : ''));

        $line = "[$dts] $ip - $conf - $uid : \"$sql\"";

        if ($force || preg_match($cmd, $sql)) {
            $logfile = $this->getLogFileName(trim($conf) . '-sql');
            error_log($line . "\n", 3, $logfile);
        }

        $this->logMessage('[SQL]' . $line);
    }

    public function logError($error, $conf = 'maestro')
    {
        if ($this->level == 0) {
            return;
        }

        $ip = sprintf("%15s", $this->host);
        $login = Manager::getLogin();
        $uid = sprintf("%-10s", ($login ? $login->getLogin() : ''));

        // data e hora no formato "dd/mes/aaaa:hh:mm:ss"
        $dts = Manager::getSysTime();

        $line = "$ip - $uid - [$dts] \"$error\"";

        $logfile = $this->getLogFileName($conf . '-error');
        error_log($line . "\n", 3, $logfile);

        $this->logMessage('[ERROR]' . $line);
    }

    public function isLogging()
    {
        return ($this->level > 0);
    }

    public function logMessage($msg)
    {
        if ($this->isLogging()) {
            $handler = "Handler" . $this->handler;
            $this->{$handler}($msg);
        }
    }

    private function handlerSocket($msg)
    {
        $strict = $this->getOption('strict');
        $allow = $strict ? ($strict == $this->host) : true;
        $host = $this->getOption('peer') ?: $this->host;
        if ($this->port && $allow) {
            if (!is_resource($this->socket)) {
                $this->socket = fsockopen($host, $this->port);
                if (!$this->socket) {
                    $this->trace_socket = -1;
                }
            }
            fputs($this->socket, $msg . "\n");
        }
    }

    private function handlerFile($msg)
    {
        $logfile = $this->home . '/' . trim($this->host) . '.log';
        $ts = Manager::getSysTime();
        error_log($ts . ': ' . $msg . "\n", 3, $logfile);
    }

    private function handlerDb($msg)
    {
        $login = Manager::getLogin();
        $uid = ($login ? $login->getLogin() : '');
        $ts = Manager::getSysTime();
        $db = Manager::getDatabase('manager');
        $idLog = $db->getNewId('seq_manager_log');
        $sql = new MSQL('idlog, timestamp, login, msg, host', 'manager_log');
        $db->execute($sql->insert(array($idLog, $ts, $uid, $msg, $this->host)));
    }

    public function getLogFileName($filename)
    {
        $dir = $this->home;
        //$dir .= "/maestro";
        $filename = basename($filename) . '.' . date('Y') . '-' . date('m') . '-' . date('d') . '-' . date('H') . '.log';
        $file = $dir . '/' . $filename;
        return $file;
    }

}

