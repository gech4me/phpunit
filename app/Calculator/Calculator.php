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

    public function calculate(): array | int | float
    {
        if(count($this->operations) > 1) {
            return array_map(function ($operation) {
                return $operation->calculate();
            }, $this->operations);
        }

        return $this->operations[0]->calculate();
    }
}
