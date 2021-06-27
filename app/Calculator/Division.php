<?php


namespace App\Calculator;


use App\Calculator\Exception\NoOperandException;
use JetBrains\PhpStorm\Pure;

class Division extends OperationAbstract implements OperationInterface
{

    public function calculate()
    {
        if(sizeof($this->operands) === 0) {
            throw new NoOperandException;
        }

        return array_reduce(array_filter($this->operands), function ($carry, $item) {
            if ($carry !== null && $item !== null) {
                return $carry / $item;
            }
            return $item;
        }, null);
    }
}
