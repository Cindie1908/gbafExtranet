<?php
namespace Model;


class Like{
    private $idLike;
    private $likeNb;
    private $dislikeNb;
    private $idUser;
    private $idActor;
    

    public function __construct($idLike,$likeNb,$dislikeNb,$idUser,$idActor){
        $this->idLike = $idLike;
        $this->likeNb = $likeNb;
        $this->dislikeNb = $dislikeNb;
        $this->idUser = $idUser;
        $this->idActor = $idActor;        
    }


    public function getIdLike(){return $this->idLike;}
    public function setIdLike($idLike){$this->idLike = $idLike;}

    public function getLikeNb(){return $this->likeNb;}
    public function setLikeNb($likeNb){$this->likeNb = $likeNb;}

    public function getDislikeNb(){return $this->dislikeNb;}
    public function setDislikeNb($dislikeNb){$this->dislikeNb = $dislikeNb;}

    public function getIdUser(){return $this->idUser;}
    public function setIdUser($idUser){$this->idUser = $idUser;}    

    public function getIdActor(){return $this->idActor;}
    public function setIdActor($idActor){$this->idActor = $idActor;}
}
