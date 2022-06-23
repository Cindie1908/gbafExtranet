<?php

namespace Model;

require_once("Model/myPDO.php");
require_once("Model/Actor.php");

class ActorsManager extends \myPDO{
    private $actors;

    public function addActor($actor){
        $this->actors[] = $actor;
    }

    public function getActors(){
        return $this->actors;
    }

    public function callActors(){
    //récupération des données de la table actors
        $db = \myPDO::dbConnect();
        $stmt = $db->prepare("SELECT * FROM `actors`");
        $stmt->execute();
        $actors = $stmt->fetchAll();
        foreach ($actors as $actor){
            $a = new Actor($actor['titre'],$actor['description'],$actor['logo'],$actor['id_actor']);
            $this->addActor($a);
        }
    }

    public function getActorById($id){
        for($i=0; $i < count($this->actors);$i++){
            if($this->actors[$i]->getIdActor() === $id){
                return $this->actors[$i];
            }
        }
    }
}
