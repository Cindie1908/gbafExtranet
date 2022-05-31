<?php
namespace Model;


class Comment{
    private $commentDate;
    private $commentText;
    private $idUser;
    private $idActor;
    private $idComment;
    private $name;
    private $firstname;


    public function __construct($commentDate,$commentText,$idUser,$idActor,$idComment,$name,$firstname){
        $this->commentDate = $commentDate;
        $this->commentText = $commentText;
        $this->idUser= $idUser;
        $this->idActor = $idActor;
        $this->idComment = $idComment;
        $this->name = $name;
        $this->firstname = $firstname;
    }

    public function getCommentDate(){return $this->commentDate;}
    public function setCommentDate($commentDate){$this->commentDate = $commentDate;}

    public function getCommentText(){return $this->commentText;}
    public function setCommentText($commentText){$this->commentText = $commentText;}

    public function getIdUser(){return $this->idUser;}
    public function setIdUser($idUser){$this->idUser = $idUser;}

    public function getIdActor(){return $this->idActor;}
    public function setIdActor($idActor){$this->idActor = $idActor;}

    public function getIdComment(){return $this->idComment;}
    public function setIdComment($idComment){$this->idComment = $idComment;}

    public function getName(){return $this->name;}
    public function setName($name){$this->name = $name;}

    public function getFirstname(){return $this->firstname;}
    public function setFirstname($firstname){$this->firstname = $firstname;}
}
