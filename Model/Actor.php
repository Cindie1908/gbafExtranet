<?php
class Actor{
    private $titre;
    private $description;
    private $logo;
    private $idActor;

    public function __construct($titre,$description,$logo,$idActor){
        $this->titre = $titre;
        $this->description= $description;
        $this->logo = $logo;
        $this->idActor = $idActor;
    }


    public function getTitre(){return $this->titre;}
    public function setTitre($titre){$this->titre = $titre;}

    public function getDescription(){return $this->description;}
    public function setDescription($description){$this->description = $description;}

    public function getLogo(){return $this->logo;}
    public function setLogo($logo){$this->logo = $logo;}

    public function getIdActor(){return $this->idActor;}
    public function setIdActor($idActor){$this->idActor = $idActor;}
}