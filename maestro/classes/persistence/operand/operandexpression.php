<?php

class OperandExpression extends PersistentOperand
{

    private $argument;

    public function __construct($criteria, $operand)
    {
        parent::__construct($criteria, $operand);
        $this->type = 'expression';
        $str = $this->argument = $this->operand;
        $separator = " ";
        $tok = strtok($str, $separator);
        while ($tok) {
            $t[$tok] = $tok;
            $tok = strtok($separator);
        }
        foreach ($t as $token) {
            $op = $criteria->getOperand($token);
            if (get_class($op) == 'OperandValue') {
                $op = $criteria->getOperand(':' . $token);
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

