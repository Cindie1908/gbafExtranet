<?php

namespace Model;

require_once("Model/myPDO.php");
require_once("Model/Comment.php");

class CommentsManager extends \myPDO{
    private $comments;

    public function addComment($comment){
        $this->comments[] = $comment;
    }

    public function getComments(){
        return $this->comments;
    }

    public function callComments(){
    //récupération des données de la table comments
        $db = \myPDO::dbConnect();
        $stmt = $db->prepare("SELECT commentdate, comment AS commentText,comments.id_user AS id_user,id_actor,id_comment,nom,prénom FROM `comments` inner join `users` ON comments.id_user=users.id_user ORDER BY `commentdate` DESC");
        $stmt->execute();
        $comments = $stmt->fetchAll();
        foreach ($comments as $comment){
            $c = new Comment($comment['commentdate'],$comment['commentText'],$comment['id_user'],$comment['id_actor'],$comment['id_comment'],$comment['nom'],$comment['prénom']);
             $this->addComment($c);
        } 
    }

    public function addCommentBd($comment,$id_user,$id_actor){
        $db = \myPDO::dbConnect();
        $stmt = $db->prepare("INSERT INTO 'comments' (comment, id_user, id_actor, commentdate) values (?, ?, ?, NOW())");
        $result = $stmt->execute($comment,$id_user,$id_actor);
        return ($result > 0);
    }
}