<?php

require_once("Model/myPDO.php");
require_once("Model/Comment.php");

class CommentManager extends myPDO{
    private $comments;

    public function addComment($comment){
        $this->comments[] = $comment;
    }

    public function getComments(){
        return $this->comments;
    }

    public function callComments(){
    //récupération des données de la table comments
        $db = myPDO::dbConnect();
        $stmt = $db->prepare("SELECT * FROM `comments` ORDER BY `commentdate` DESC");
        $stmt->execute();
        $comments = $stmt->fetchAll();
        foreach ($comments as $comment){
            $c = new comment($comment['idComment'],$comment['idUser'],$comment['idActor'],$comment['commentDate'],$comment['commentText']);
            $this->addComment($c);
        }
    }
    public function getCommentsByActorId($id){
        for($i=0; $i < count($this->comments);$i++){
            if($this->comments[$i]->getIdActor() === $id){
                return $this->comments[$i];
            }
        }
    }
}