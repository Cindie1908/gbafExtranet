<?php

require_once("Model/myPDO.php");
require_once("Model/Actor.php");

class ActorManager extends myPDO{
    private $actors;

    public function addActor($actor){
        $this->actors[] = $actor;
    }

    public function getActors(){
        return $this->actors;
    }

    public function callActors(){
    //récupération des données de la table actors
        $db = myPDO::dbConnect();
        $stmt = $db->prepare("SELECT * FROM `actors`");
        $stmt->execute();
        $actors = $stmt->fetchAll();
        foreach ($actors as $actor){
            $a = new actor($actor['titre'],$actor['description'],$actor['logo'],$actor['id_actor']);
            $this->addActor($a);
        }
    }
}
