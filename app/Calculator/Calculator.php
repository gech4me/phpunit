<?php


namespace App\Calculator;


class Calculator
{
    protected array $operations = [];

    public function setOperation(OperationInterface $operation) {
        $this->operations[] = $operation;
    }

    public function setOperations(array $operations) {
        $this->operations = array_merge($this->operations, array_filter($operations, function ($operation) {
            return $operation instanceof OperationInterface;
        }));
    }

    public function getOperations() : array
    {
        return $this->operations;
    }

    public function calculate()
    {
        return $this->operations[0]->calculate();
    }
}
