<?php


namespace App\Calculator;


use App\Calculator\Exception\NoOperandException;
use JetBrains\PhpStorm\Pure;

class Addition extends OperationAbstract implements OperationInterface
{

    #[Pure]
    public function calculate() : int | float
    {
        if(sizeof($this->operands) === 0) {
            throw new NoOperandException;
        }
       return array_sum($this->operands);
    }
}
