<?php

class OperandFunction extends PersistentOperand
{

    private $argument;

    public function __construct($operand, $criteria)
    {
        parent::__construct($operand);
        $this->type = 'public function';
        $str = $this->argument = $this->operand;
        $separator = "+-/*,()";
        $tok = strtok($str, $separator);
        while ($tok) {
            $t[$tok] = $tok;
            $tok = strtok($separator);
        }
        foreach ($t as $token) {
            $op = criteria::getOperand($token, $criteria);
            if (get_class($op) == 'OperandValue') {
                $op = criteria::getOperand(':' . $token, $criteria);
            }
            $this->argument = str_replace($token, $op->getSql(), $this->argument);
        }
    }

    public function getSql()
    {
        return $this->argument;
    }

    public function getSqlGroup()
    {
        return $this->argument;
    }

    public function getSqlOrder()
    {
        return $this->argument;
    }

}

