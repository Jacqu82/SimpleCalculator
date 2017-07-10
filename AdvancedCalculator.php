<?php

require 'Calculator.php';

class AdvancedCalculator extends Calculator
{

    public function pow($num1, $num2)
    {
        $result = pow($num1, $num2);
        return $result;
    }

    public function root($num1, $num2)
    {
        $result = pow($num1, 1 / $num2);
        return $result;
    }

    public function modulo($num1, $num2)
    {
        $result = $num1 % $num2;
        return $result;
    }

    public function percent($num1, $num2)
    {
        $result = $num1 * $num2 / 100;
        return $result;
    }
}
