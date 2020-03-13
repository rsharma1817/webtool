<?php

class OperandValue extends PersistentOperand
{

    public function __construct($operand)
    {
        parent::__construct($operand);
        $this->type = 'value';
    }

    public function getSql()
    {
        $value = $this->operand;
        if ($value[0] != '?') {
            if ($value[0] == ':') {
                $value = substr($value, 1);
            } elseif (($value === '') || (strtolower($value) == 'null') || is_null($value)) {
                $value = 'null';
            } elseif ($value[0] != "'") {
                $value = "'" . addslashes($value) . "'";
            }
        }
        return $value;
    }

}
