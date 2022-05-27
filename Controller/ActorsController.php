<?php
require_once "Model/ActorsManager.php";

class ActorsController{
    private $actorsManager;

    public function __construct(){
        $this->actorsManager = new ActorManager;
        $this->actorsManager->callActors();
    }

    public function viewActors()
    {
        $actors = $this->actorsManager->getActors();
        require "view/viewListOfActors.php";
    }

    public function viewAnActor($id){
        $actorById = $this->actorsManager->getActorById($id);
        require "view/viewActor.php";
    }
}