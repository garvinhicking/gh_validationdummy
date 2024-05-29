<?php
namespace GarvinHicking\ValidationDummy\Controller;

use GarvinHicking\ValidationDummy\Domain\Model\Person;
use GarvinHicking\ValidationDummy\Domain\Repository\PersonRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Annotation\Validate;
use TYPO3\CMS\Extbase\Annotation\IgnoreValidation;

class DebugController extends ActionController
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
}
