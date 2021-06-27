<?php


namespace Calculator;


use App\Calculator\Addition;
use App\Calculator\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{

    public function testCanSetSingleOperation()
    {
        $addition = new Addition;
        $addition->setOperands([2,3]);

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperation($addition);

        $this->assertCount(1,$calculator->getOperations());
    }

    public function testCanSetMultipleOperation()
    {
        $addition1 = new Addition;
        $addition1->setOperands([2,3]);

        $addition2 = new Addition;
        $addition2->setOperands([2,8]);

        $calculator = new Calculator;
        $calculator->setOperations([$addition1, $addition2]);

        $this->assertCount(2, $calculator->getOperations());
    }
}
