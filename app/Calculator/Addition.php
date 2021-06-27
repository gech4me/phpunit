<?php


namespace App\Calculator;


use App\Calculator\Exception\NoOperandException;
use JetBrains\PhpStorm\Pure;

class Addition implements OperationInterface
{
    protected array $operands = [];

    public function setOperands(array $operands)
    {
        $this->operands = $operands;
    }

    #[Pure]
    public function calculate() : int | float
    {
        if(sizeof($this->operands) === 0) {
            throw new NoOperandException;
        }
       return array_sum($this->operands);
    }
}
