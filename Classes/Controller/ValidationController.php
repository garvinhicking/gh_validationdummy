<?php
namespace GarvinHicking\ValidationDummy\Controller;

use GarvinHicking\ValidationDummy\Domain\Model\Person;
use GarvinHicking\ValidationDummy\Domain\Repository\PersonRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Annotation\Validate;
use TYPO3\CMS\Extbase\Annotation\IgnoreValidation;

class ValidationController extends ActionController
{
    public function __construct(protected PersonRepository $personRepository)
    {
    }

    public function listAction(): ResponseInterface
    {
        $persons = $this->personRepository->findAll();
        $this->view->assign('persons', $persons);

        return $this->htmlResponse();
    }

    public function newAction(): ResponseInterface
    {
        $person = new Person();
        $this->view->assign('person', $person);

        return $this->htmlResponse();
    }

    /**
     * @todo: This here actually does not work. If you add "ignoreValidation",
     *        this also bypasses the Validate(...) annotation, too.
     *        If you leave out IgnoreValidation, the DomainModel Validation is
     *        executed on top of the controller validation, so it cannot be bypassed.
     * @IgnoreValidation("person")
     * @Validate(param="person", validator="GarvinHicking\ValidationDummy\Domain\Validator\PersonValidator")
     */
    public function createAction(Person $person): ResponseInterface
    {
        $this->personRepository->add($person);

        return $this->htmlResponse();
    }

    public function editAction(Person $person): ResponseInterface
    {
        $this->view->assign('person', $person);

        return $this->htmlResponse();
    }

    /**
     * @Validate(param="person", validator="GarvinHicking\ValidationDummy\Domain\Validator\PersonValidator")
     */
    public function updateAction(Person $person): ResponseInterface
    {
        $this->personRepository->update($person);

        return $this->htmlResponse();
    }
}
