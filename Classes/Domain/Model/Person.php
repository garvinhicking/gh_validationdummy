<?php

namespace GarvinHicking\ValidationDummy\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\Validate;

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Person extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    protected string $firstName = '';
    protected string $lastName = '';

    // START: Some attributes for fluid debugging
    protected ?CustomObject $customObject = null;
    protected ?CustomObject $customObjectWithArguments = null;
    private string $invisibleProperty = 'I am invisible';
    public string $visibleProperty = 'I am visible';
    protected ?FileReference $fileReference = null;
    protected ?FileReference $invisibleFileReference = null;
    protected ?ObjectStorage $someLazyObjectStorage = null;
    public function __construct()
    {
        $this->someLazyObjectStorage = new ObjectStorage();
    }
    protected ?FileReference $fal = null;
    // END: Some attributes for fluid debugging

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

    // START: Some getter methods to demonstrate debugging facilities
    /**
     * @return FileReference|null
     */
    public function getFal(): ?FileReference
    {
        return $this->fal;
    }

    /**
     * @param FileReference|null $fal
     */
    public function setFal(?FileReference $fal): void
    {
        $this->fal = $fal;
    }

    // Valid public getter that will reveal $this->customObject to Fluid.
    public function getCustomObject()
    {
        return $this->customObject;
    }

    // INVALID public getter because a method is called on an object
    // INVALID public getter because the method contains an argument
    public function getCustomObjectWithArguments(int $counter)
    {
        return $this->customObject->fromCounter($counter);
    }

    // INVALID getter, because it cannot be called by Fluid
    private function getInvisibleProperty()
    {
        return $this->invisibleProperty;
    }

    // Valid public getter for a normal string variable
    public function getVisibleProperty()
    {
        return $this->visibleProperty;
    }

    // Valid public getter for a static string
    public function getSomeStaticString()
    {
        return 'This is some content.';
    }

    // INVALID getter because a function is called for the return statement
    // (Note: This would be trivial in the example, but in real-life
    // if the getter would for example modify production data, a debugging
    // ViewHelper should not just execute such a method!)
    public function getSomeStaticStringWithFunction()
    {
        return explode(',', '1,2,3,4');
    }

    // Valid getter returning a FileReference (which will further be inspected)
    public function getFileReference(): FileReference
    {
        return $this->fileReference;
    }

    // INVALID getter because function is protected
    protected function getInvisibleFileReference(): FileReference
    {
        return $this->invisibleFileReference;
    }

    // INVALID getter because a method getOriginalFile() is executed
    // (Note: In this case this would be wanted, but we cannot expect
    // any method call to be "safe" to execute at this point)
    public function getFileFromFileReference(): File
    {
        return $this->fileReference->getOriginalFile();
    }

    // Valid getter, the lazy object initialization has been executed.
    public function getSomeLazyObjectStorage(): ObjectStorage
    {
        return $this->someLazyObjectStorage;
    }

    // Valid getter, method only contains comments and whitespace
    public function getSomeLazyObjectStorageWithComment(): ObjectStorage
    {
        // Document something here:
        // ... ... ... ...

        /* This is a damn
         * fine comment
         */

        # $something->commented();

        return $this->someLazyObjectStorage;
    }

    // INVALID getter, method contains further code
    public function getSomeLazyObjectStorageWithMethod(): ObjectStorage
    {
        $this->initializeSomething();
        return $this->someLazyObjectStorage;
    }
    // END: Some getter methods to demonstrate debugging facilities

}
