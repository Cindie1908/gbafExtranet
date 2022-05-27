<?php
class Comment{
    private $idComment;
    private $idUser;
    private $idActor;
    private $commentDate;
    private $commentText;

    public function __construct($idComment,$idUser,$idActor,$commentDate,$commentText){
        $this->idComment = $idComment;
        $this->idUser= $idUser;
        $this->idActor = $idActor;
        $this->commentDate = $commentDate;
        $this->commentText = $commentText;
    }


    public function getIdComment(){return $this->idComment;}
    public function setIdComment($idComment){$this->idComment = $idComment;}

    public function getIdUser(){return $this->idUser;}
    public function setIdUser($idUser){$this->idUser = $idUser;}

    public function getIdActor(){return $this->idActor;}
    public function setIdActor($idActor){$this->idActor = $idActor;}

    public function getCommentDate(){return $this->commentDate;}
    public function setCommentDate($commentDate){$this->commentDate = $commentDate;}

    public function getCommentText(){return $this->commentText;}
    public function setCommentText($commentText){$this->commentText = $commentText;}
}