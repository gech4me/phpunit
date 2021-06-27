<?php


namespace App\Calculator;


use JetBrains\PhpStorm\Pure;

class Addition
{
    protected array $operands = [];

    public function setOperands(array $operands)
    {
        $this->operands = $operands;
    }

    #[Pure]
    public function calculate() : int | float
    {
       return array_sum($this->operands);
    }
}
