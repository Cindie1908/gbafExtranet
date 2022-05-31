<?php

namespace Controller;

//require_once "Model/ActorsManager.php";

class ActorsController{
    private $actorsManager;

    public function __construct(){
        $this->actorsManager = new \Model\ActorsManager();
        $this->actorsManager->callActors();
    }

    public function viewActors()
    {
        $actors = $this->actorsManager->getActors();
        require "view/viewListOfActors.php";
    }

    public function viewAnActor(){
        $id = $_GET['id'];
        $actorById = $this->actorsManager->getActorById($id);
        require "view/viewActor.php";
    }
}