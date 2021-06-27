<?php


namespace Calculator;


use App\Calculator\Addition;
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
}
