<?php
namespace GarvinHicking\ValidationDummy\Controller;

use GarvinHicking\ValidationDummy\Domain\Model\Person;
use GarvinHicking\ValidationDummy\Domain\Repository\PersonRepository;
use GarvinHicking\ValidationDummy\Dto\PersonDto;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class DtoController extends ActionController
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
        $dto = new PersonDto();
        $this->view->assign('person', $dto);

        return $this->htmlResponse();
    }

    public function createAction(PersonDto $person): ResponseInterface
    {
        $persistenceObject = new Person();
        $persistenceObject->setFirstName($person->getFirstName());
        $persistenceObject->setLastName($person->getLastName());
        // Note: We do NOT use the setSpecial() method here, because
        //       that is a property our DTO does not cover.

        $this->personRepository->add($persistenceObject);

        return $this->htmlResponse();
    }

    // Note: We receive a UID of the original object here, not the full object itself
    //       This is because if we used the actual "Person" object here, Extbase
    //       validation would get triggered, which would then reject an object
    //       with the missing "special" attribute, if empty.
    public function editAction(int $personUid): ResponseInterface
    {
        $person = $this->personRepository->findByUid($personUid);
        if ($person) {
            $dto = new PersonDto();
            $dto->setFirstName($person->getFirstName());
            $dto->setLastName($person->getLastName());
            $dto->setReferenceUid($personUid);
            // Note: getSpecial() not used, because that is a property
            //       we are not editing here, the DTO has no knowledge of this.

            $this->view->assign('person', $dto);
        }

        return $this->htmlResponse();
    }

    public function updateAction(PersonDto $person): ResponseInterface
    {
        $persistenceObject = $this->personRepository->findByUid($person->getReferenceUid());
        if ($persistenceObject) {
            $persistenceObject->setFirstName($person->getFirstName());
            $persistenceObject->setLastName($person->getLastName());
            $this->personRepository->update($persistenceObject);
            // Note: We only update very specific properties now, only those we really cover
            //       with our DTO!
        } else {
            $this->view->assign('error', true);
        }

        return $this->htmlResponse();
    }
}
