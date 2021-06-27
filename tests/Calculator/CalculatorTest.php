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

    public function testIgnoreOperationIfIsNotInstanceOfOperationInterface()
    {
        $addition1 = new Addition;
        $addition1->setOperands([2,3]);

        $calculator = new Calculator;
        $calculator->setOperations([$addition1, 'Bla']);

        $this->assertCount(1, $calculator->getOperations());
    }

    public function testCanCalculateResult()
    {
        $addition = new Addition;
        $addition->setOperands([2,3]);

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperation($addition);

        $this->assertEquals(5,$calculator->calculate());
    }

    public function testCalculateMethodReturnMutlipeResults()
    {
        $addition = new Addition;
        $addition->setOperands([2,3]);

        $division = new \App\Calculator\Division;
        $division->setOperands([50,2]);

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperations([$addition, $division]);

        $this->assertIsArray($calculator->calculate());
        $this->assertEquals(5,$calculator->calculate()[0]);
        $this->assertEquals(25,$calculator->calculate()[1]);
    }
}
