<?php

namespace Controller;

//require_once "Model/ActorsManager.php";

class ActorsController extends ParentController
{
    private $actorsManager;

    public function __construct()
    {
        if (!$this->isAuthenticated()){
            $this->redirect("/?page=users::login");
        }
        $this->actorsManager = new \Model\ActorsManager();
        $this->actorsManager->callActors();
    }

    public function viewActors()
    {
        $actors = $this->actorsManager->getActors();
        require "view/viewListOfActors.php";
    }

    public function viewAnActor()
    {
        $id = $_GET['id'];
        $actorById = $this->actorsManager->getActorById($id);
        require "view/viewActor.php";
    }
}