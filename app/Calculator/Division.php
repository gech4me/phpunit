<?php


namespace App\Calculator;


use App\Calculator\Exception\NoOperandException;
use JetBrains\PhpStorm\Pure;

class Division extends OperationAbstract implements OperationInterface
{
    #[Pure]
    public function calculate() : int | float
    {
        $result = 0;
        foreach ($this->operands as $key => $operand) {
            if($key === 0) {
                $result = $operand;
                continue;
            }

            $result /= $operand;
        }

        return $result;
    }
}
