<?php


namespace Calculator;

use PHPUnit\Framework\TestCase;

class DivisionTest extends TestCase
{
    public function testDivideAGivenOperands()
    {
        $division = new \App\Calculator\Division;

        $division->setOperands([100, 50]);

        $this->assertEquals(2,$division->calculate());
    }

    public function testRemovesDivisionByZero()
    {
        $division = new \App\Calculator\Division;
        $division->setOperands([50,0,0,2,0]);

        $this->assertEquals(25, $division->calculate());
    }
}
