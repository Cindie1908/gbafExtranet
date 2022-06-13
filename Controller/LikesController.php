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
        //si boutons like ou dislike déjà activé > on ne fait rien
        //if($likeById[like]===null && $likeById[dislike]===null)
        // sinon pour liker, on post 1 pour like et 0 pour dislike
        // ou pour disliker, on post 0 pour like et 1 pour dislike

    }
}