<?php

class DMLCriteria extends PersistentCriteria
{
    protected $transaction;

    public function __construct($classMap, $manager)
    {
        parent::__construct($classMap, $manager);
        $this->transaction = NULL;
    }

    public function setTransaction($transaction)
    {
        $this->transaction = $transaction;
    }

    public function getTransaction()
    {
        return $this->transaction;
    }

    public function where($op1, $operator = '', $op2 = NULL)
    {
        $this->whereCondition->and_($op1, $operator, $op2);
        return $this;
    }

    public function and_($op1, $operator = '', $op2 = NULL)
    {
        return $this->where($op1, $operator, $op2);
    }

    public function or_($op1, $operator = '', $op2 = NULL)
    {
        $this->whereCondition->or_($op1, $operator, $op2);
        return $this;
    }
}
