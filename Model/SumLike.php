<?php
namespace Model;


class SumLike{
    private $likeSum;
    private $dislikeSum;
    private $idActor;
    

    public function __construct($likeSum,$dislikeSum,$idActor){
        $this->likeSum = $likeSum;
        $this->dislikeSum = $dislikeSum;
        $this->idActor = $idActor;        
    }


    public function getLikeSum(){return $this->likeSum;}
    public function setLikeSum($likeSum){$this->likeSum = $likeSum;}

    public function getDislikeSum(){return $this->dislikeSum;}
    public function setDislikeSum($dislikeSum){$this->dislikeSum = $dislikeSum;}

    public function getIdActor(){return $this->idActor;}
    public function setIdActor($idActor){$this->idActor = $idActor;}
}
