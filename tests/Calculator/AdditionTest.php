<?php


namespace Calculator;

use PHPUnit\Framework\TestCase;

class AdditionTest extends TestCase
{
    public function testCanAddOperands()
    {
        $addition = new \App\Calculator\Addition;

        $addition->setOperands([2,3]);

        $this->assertEquals(5,$addition->calculate());
    }
}
