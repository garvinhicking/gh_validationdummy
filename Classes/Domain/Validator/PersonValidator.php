<?php

namespace GarvinHicking\ValidationDummy\Domain\Validator;

use TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator;

final class PersonValidator extends AbstractValidator
{
    protected function isValid(mixed $value): void
    {
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($value, 'Validation');
        $this->addError('Something something dark side', 1297418974);
    }
}
