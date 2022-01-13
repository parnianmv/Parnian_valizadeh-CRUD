<?php

namespace CRUD\Controller;

use CRUD\Model\Actions;
use CRUD\Model\Person;
use CRUD\Helper\PersonHelper;

class PersonController
{
    public function switcher($uri,$request)
    {
        switch ($uri)
        {
            case Actions::CREATE:
                $this->createAction($request);
                break;
            case Actions::UPDATE:
                $this->updateAction($request);
                break;
            case Actions::READ:
                $this->readAction($request);
                break;
            case Actions::READ_ALL:
                $this->readAllAction($request);
                break;
            case Actions::DELETE:
                $this->deleteAction($request);
                break;
            default:
                break;
        }	
    }

    public function createAction($request)
    {
		$personHelper = new PersonHelper();
		$person = new Person();
		$person->setFirstName($request["firstName"]);
		$person->setLastName($request["lastName"]);
		$person->setUsername($request["username"]);
		$personHelper->insert($person);		
    }

    public function updateAction($request)
    {
		$personHelper = new PersonHelper();
		$person = new Person();
		$person->setFirstName($request["firstName"]);
		$person->setLastName($request["lastName"]);
		$person->setUsername($request["username"]);
		$personHelper->update($person);	
    }

    public function readAction($request)
    {
		$personHelper = new PersonHelper();
		$personHelper->fetch($request["id"]);
    }
    public function readAllAction($request)
    {
		$personHelper = new PersonHelper();
		$personHelper->fetchAll();
    }

    public function deleteAction($request)
    {
		$personHelper = new PersonHelper();
		$personHelper->delete($request["username"]);
    }

}