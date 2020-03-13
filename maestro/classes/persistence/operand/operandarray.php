<?php

class OperandArray extends PersistentOperand
{

    public function __construct($operand)
    {
        parent::__construct($operand);
        $this->type = 'array';
    }

    public function getSql()
    {
        $sql = "(";
        $i = 0;
        if (is_array($this->operand)) {
            $list = '';
            foreach ($this->operand as $o) {
                $list .= ($i++ > 0) ? ", " : "";
                $list .= "'$o'";
            }
            $sql .= (($list == '') ? "''" : $list);
        } else {
            $sql .= "'$this->operand'";
        }
        $sql .= ")";
        return $sql;
    }

}

