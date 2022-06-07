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
}