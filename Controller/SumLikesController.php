<?php

namespace Controller;

//require_once "Model/ActorsManager.php";

class SumLikesController{
    private $SumLikesManager;

    public function __construct(){
        $this->SumLikesManager = new \Model\SumLikesManager();
        $this->SumLikesManager->callSumLikes();
    }

    public function viewSumLikes()
    {
        $sumLikes = $this->SumLikesManager->getSumLikes();
        require "view/viewLike.php";
    }

    public function viewSumDislikes()
    {
        $sumLikes = $this->SumLikesManager->getSumLikes();
        require "view/viewDislike.php";
    }

    public function viewSumLikeForAnActor(){
        $id = $_GET['id'];
        $SumLikeById = $this->SumLikesManager->getSumLikeById($id);
        //require "view/viewLike.php";
    }
}