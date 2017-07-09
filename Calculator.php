<?php

class Calculator
{

    protected $num1;
    protected $num2;

    public function __construct()
    {
        $this->num1 = 0;
        $this->num2 = 0;
    }

    public function add($num1, $num2)
    {
        $result = $num1 + $num2;
        return $result;
    }

    public function multiply($num1, $num2)
    {
        $result = $num1 * $num2;
        return $result;
    }

    public function subtract($num1, $num2)
    {
        $result = $num1 - $num2;
        return $result;
    }

    public function divide($num1, $num2)
    {
        if ($num2 != 0) {
            $result = $num1 / $num2;
            return $result;
        } else {
            die("<b>Nie dzielimy przez 0!!!</b><br/><br/>");
        }
    }
}
