<?php

namespace Controller;

//require_once "Model/ActorsManager.php";

class LikesController{
    private $likesManager;

    public function __construct(){
        $this->likesManager = new \Model\LikesManager();
        $this->likesManager->callLikes();
    }

    public function viewLikes()
    {
        $likes = $this->likesManager->getLikes();
        //require "view/viewLike.php";
    }

    public function viewLikeForAnActor(){
        $id = $_GET['id'];
        $likeById = $this->likesManager->getLikeById($id);
        //require "view/viewLike.php";
    }

    Public function postLikeForAnActor(){
        //on récupére le idUser et l'idActor
        $user=$_SESSION["user"];
        $id_user= $user->getIdUser();
        $id_actor = $_POST['id_actor'];

        dump($_SESSION['idUser']);
        dump($_POST['idActor']);
        //on récupére les infos like par user et acteur de la bdd
        //on vérifie si boutons like ou dislike activés 
        //si l'un des 2 activé > on ne fait rien
        //if($likeById[like]===null && $likeById[dislike]===null)
        // sinon pour liker, on post 1 pour like et 0 pour dislike
        // ou pour disliker, on post 0 pour like et 1 pour dislike

    }
}