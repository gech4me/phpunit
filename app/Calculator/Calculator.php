<?php


namespace App\Calculator;


class Calculator
{
    protected array $operations = [];

    public function setOperation(OperationInterface $operation) {
        $this->operations[] = $operation;
    }

    public function getOperations() : array
    {
        return $this->operations;
    }
}
