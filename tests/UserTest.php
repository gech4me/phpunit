<?php


use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testThatCanGetFirstName() {
        $user = new App\Models\User;
        $user->setFirstName('Getachew');

        $this->assertEquals('Getachew',$user->getFirstName());
    }

    public function testThatCanGetLastName() {
        $user = new App\Models\User;

        $user->setLastName("Mulat");

        $this->assertEquals('Mulat', $user->getLastName());
    }

    public function testThatCanTrimmedFirstNameAndLastName()
    {
        $user = new App\Models\User;

        $user->setFirstName('Getachew   ');

        $user->setLastName('    Mulat');

        $this->assertEquals('Getachew',$user->getFirstName());
        $this->assertEquals('Mulat',$user->getLastName());
    }

    public function testThatCanGetFullName()
    {
        $user = new App\Models\User;

        $user->setFirstName('Getachew');

        $user->setLastName('Mulat');

        $this->assertEquals('Getachew Mulat', $user->getFullName());
    }

    public function testThatCanGetEmail()
    {
        $user = new App\Models\User;

        $user->setEmail('gech2me@gmail.com');

        $this->assertEquals('gech2me@gmail.com', $user->getEmail());
    }

    public function testEmailVariablesContainsCorrentValue()
    {
        $user = new App\Models\User;

        $user->setFirstName('Getachew');
        $user->setLastName('Mulat');
        $user->setEmail('gech2me@gmail.com');

        $emailVariables = $user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals('Getachew Mulat', $emailVariables['full_name']);
        $this->assertEquals('gech2me@gmail.com', $emailVariables['email']);
    }
}
