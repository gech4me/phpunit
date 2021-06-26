<?php


namespace App\Models;


use JetBrains\PhpStorm\ArrayShape;

class User
{
    private string $firstName;
    private string $lastName;
    private string $email;

    public function setFirstName(string $firstName) : void {
        $this->firstName = trim($firstName);
    }

    public function getFirstName(): string {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = trim($lastName);
    }

    public function getFullName() : string
    {
        return "$this->firstName $this->lastName";
    }

    public function getEmail() : string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    const EMAIL_SHAPE = ['full_name' => "string", 'email' => "string"];
    #[ArrayShape(self::EMAIL_SHAPE)]
    public function getEmailVariables() : array
    {
        return [
            'full_name' => $this->getFullName(),
            'email' => $this->getEmail()
        ];
    }


}
