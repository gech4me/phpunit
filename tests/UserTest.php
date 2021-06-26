<?php


use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = new User;
    }

    public function testThatCanGetFirstName() {

        $this->user->setFirstName('Getachew');

        $this->assertEquals('Getachew',$this->user->getFirstName());
    }

    public function testThatCanGetLastName() {

        $this->user->setLastName("Mulat");

        $this->assertEquals('Mulat', $this->user->getLastName());
    }

    public function testThatCanTrimmedFirstNameAndLastName()
    {

        $this->user->setFirstName('Getachew   ');

        $this->user->setLastName('    Mulat');

        $this->assertEquals('Getachew',$this->user->getFirstName());
        $this->assertEquals('Mulat',$this->user->getLastName());
    }

    public function testThatCanGetFullName()
    {

        $this->user->setFirstName('Getachew');

        $this->user->setLastName('Mulat');

        $this->assertEquals('Getachew Mulat', $this->user->getFullName());
    }

    public function testThatCanGetEmail()
    {

        $this->user->setEmail('gech2me@gmail.com');

        $this->assertEquals('gech2me@gmail.com', $this->user->getEmail());
    }

    public function testEmailVariablesContainsCorrentValue()
    {

        $this->user->setFirstName('Getachew');
        $this->user->setLastName('Mulat');
        $this->user->setEmail('gech2me@gmail.com');

        $emailVariables = $this->user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals('Getachew Mulat', $emailVariables['full_name']);
        $this->assertEquals('gech2me@gmail.com', $emailVariables['email']);
    }
}
