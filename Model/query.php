<?php
require_once("C:\MAMP\htdocs\gbafExtranetCode\Model\myPDO.php");

function getDatas(){
//récupération des données de la table actors
    $db = myPDO::dbConnect();
    /** @var PDOStatement $users */
    $users = $db->query("SELECT * FROM `users`");

    return $users;  
}



function getActors(){
//récupération des données de la table actors
    $db = myPDO::dbConnect();
    $actors = $db->query("SELECT * FROM `actors`");
    return $actors;
}

function getActor($actorId){
//récupération d'un acteur par ID'
    $db = myPDO::dbConnect();
    $req = $db->prepare("SELECT * FROM `actors` WHERE `id_actor` = ?");
    $req->execute(array($actorId));
    $actor = $req->fetchAll();

    //return $actor;
}

function getComments($actorId){
//récupération des commentaires sur un acteur'
    $db = myPDO::dbConnect();
    $comments = $db->prepare("SELECT * FROM `comments` WHERE `id_actor` = ? ORDER BY `commentdate` DESC");
    $comments->execute(array($actorId));

    return $comments;
}


function postComment($actorId, $userId, $comment){
// envoi d'un commentaire dans la base  
    $db = myPDO::dbConnect();
    $comments = $db->prepare('INSERT INTO comments(id_actor, id_user, comment, commentdate) VALUES(?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($actorId, $userId, $comment));

    return $affectedLines;
}

// connexion à MySql
/*function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=gbaf_extranet;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    }
    catch(PDOException $e)
    {
        die('Erreur de connexion : '.$e->getMessage());
    }
}*/