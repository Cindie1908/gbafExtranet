<?php
require_once "Model/CommentsManager.php";

class CommentsController{
    private $commentsManager;

    public function __construct(){
        $this->commentsManager = new CommentManager;
        $this->commentsManager->callComments();
    }

    public function viewComments()
    {
        $comments = $this->commentsManager->getComments();
        require "view/viewComments.php";
    }

    /*public function viewCommentsForAnActor($id){
        $commentsById = $this->commentsManager->getCommentsByActorId($id);
        require "view/viewComments.php";
    }*/
}