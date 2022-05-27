<?php

require_once("model/myPDO.php");
require_once("view/commentsObject.php");

class commentsManager{
    public static function getActorsWithComments(){
    //récupération des données de la table actors
        $db = myPDO::dbConnect();
        $stmt = $db->prepare("SELECT titre, description, logo, commentdate, comment AS text,comments.id_user AS id_user,comments.id_actor AS id_actor,id_comment,nom,prénom FROM `actors` LEFT JOIN `comments`ON actors.id_actor=comments.id_actor inner join `users` ON comments.id_user=users.id_user");
        $stmt->execute();
        $comments = $stmt->fetchAll();
        foreach ($comments as $comment){
            Comment::$comments[] = new comment($comment['titre'],$comment['description'],$comment['logo'],$comment['commentdate'],$comment['text'],$comment['id_user'],$comment['id_actor'],$comment['id_comment'],$comment['nom'],$comment['prénom']);
        }
    }
    public static function getComments($id_actor){
        //récupération des données de la table actors
            $db = myPDO::dbConnect();
            $stmt = $db->prepare("SELECT titre, description, logo, commentdate, comment AS text,comments.id_user AS id_user,comments.id_actor AS id_actor,id_comment,nom,prénom FROM `actors` LEFT JOIN `comments`ON actors.id_actor=comments.id_actor inner join `users` ON comments.id_user=users.id_user where comments.id_actor= :id");
            $stmt->bindValue(":id",$id_actor,PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
            /*$comments = $stmt->fetchAll();
            foreach ($comments as $comment){
                Comment::$comments[] = new comment($comment['titre'],$comment['description'],$comment['logo'],$comment['commentdate'],$comment['text'],$comment['id_user'],$comment['id_actor'],$comment['id_comment'],$comment['nom'],$comment['prénom']);
            }*/
        }
}