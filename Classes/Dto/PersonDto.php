<?php

namespace GarvinHicking\ValidationDummy\Dto;

use TYPO3\CMS\Extbase\Annotation\Validate;

class PersonDto
{
    protected string $firstName = '';
    protected string $lastName = '';
    protected int $referenceUid = 0;

    public function getReferenceUid(): int
    {
        return $this->referenceUid;
    }

    public function setReferenceUid(int $referenceUid): void
    {
        $this->referenceUid = $referenceUid;
    }

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
}
