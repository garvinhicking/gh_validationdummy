<?php

namespace GarvinHicking\ValidationDummy\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\Validate;

class Person extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    protected string $firstName = '';
    protected string $lastName = '';

    /**
     * @Validate("NotEmpty")
     */
    protected string $special = '';

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getSpecial(): string
    {
        return $this->special;
    }

    public function setSpecial(string $special): void
    {
        $this->special = $special;
    }



}
