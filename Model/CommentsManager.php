<?php

namespace Model;

require_once("Model/myPDO.php");
require_once("Model/Comment.php");

class CommentsManager extends \myPDO{
    private $comments = [];

    public function addComment($comment){
        $this->comments[] = $comment;
    }

    public function getComments(){
        if(count($this->comments) === 0)
        {
            $this->callComments();
        }
        return $this->comments;
    }

    public function callComments(){
    //récupération des données de la table comments
        $db = \myPDO::dbConnect();
        $stmt = $db->prepare("SELECT DATE_FORMAT(commentdate,'%d/%m/%Y') AS commentdate, comment AS commentText,comments.id_user AS id_user,id_actor,id_comment,nom,prenom FROM `comments` inner join `users` ON comments.id_user=users.id_user ORDER BY `commentdate` DESC");
        $stmt->execute();
        $comments = $stmt->fetchAll();
        foreach ($comments as $comment){
            $c = new Comment($comment['commentdate'],$comment['commentText'],$comment['id_user'],$comment['id_actor'],$comment['id_comment'],$comment['nom'],$comment['prenom']);
             $this->addComment($c);
        } 
    }

    public function addCommentBd($comment,$id_user,$id_actor){
        //envoi des données à la table comments
        
        $user=$_SESSION["user"];
        $id_user= $user->getIdUser();
        $id_actor = $_POST['id_actor'];
        $comment = $_POST['commentmsg'];
        $db = \myPDO::dbConnect();
        $stmt = $db->prepare("INSERT INTO `comments` (comment, id_user, id_actor, commentdate) values (?, ?, ?, NOW())");
        $result = $stmt->execute([
            $comment,
            $id_user,
            $id_actor
        ]);
        return ($result > 0);
    }
}