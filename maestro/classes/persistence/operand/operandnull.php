<?php

class OperandNull extends PersistentOperand
{

    public function __construct($operand)
    {
        parent::__construct($operand);
        $this->type = 'null';
    }

}

