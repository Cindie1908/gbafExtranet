<?php

namespace Controller;

//require_once "Model/CommentsManager.php";

class CommentsController{
    private $commentsManager;

    public function __construct(){
        $this->commentsManager = new \Model\CommentsManager();
        $this->commentsManager->callComments();
    }

    public function viewComments()
    {
        $comments = $this->commentsManager->getComments();
        require "view/viewComments.php";
    }

    public function addComment(){
        /*$id = $_GET['id'];
        $actorById = $this->commentsManager->getComments();*/
        //require "view/addComment.php";
        $comments = $this->commentsManager->getComments();
        require "view/viewComments.php";
    }

    public function addCommentValidation(){
        $this->CommentsManager->addCommentBd($_POST['commentmsg'],$_POST[],$_POST[]);
        $id = $_GET['id'];
        header('Location:?page=actors::viewAnActor&id='.$id);
    }
}