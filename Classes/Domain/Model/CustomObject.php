<?php

declare(strict_types=1);

namespace GarvinHicking\ValidationDummy\Domain\Model;

class CustomObject
{
    public function __construct(private string $somethingPrivate = 'Emba')
    {
    }

    public function fromCounter(int $counter)
    {
        return new self('My bean counter is: ' . $counter);
    }

    public function getSomethingPrivate()
    {
        return $this->somethingPrivate;
    }
}
