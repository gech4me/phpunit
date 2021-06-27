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
}
