<?php

namespace Controller;


class CommentsController /*extends ParentController*/
{
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
        $comments = $this->commentsManager->getComments();
        require "view/viewComments.php";
    }

    public function postCommentForAnActor(){
        if (!isset($_POST['commentmsg']))
            {
                echo('votre commentaire est vide');
                return;
            }

        $user=$_SESSION["user"];
        $id_user= $user->getIdUser();
        $comments =[
            'comment' => $comment = $_POST['commentmsg'],
            'id_user' => $id_user,
            'id_actor' => $id_actor = $_POST['id_actor'],
        ];
        $this->commentsManager->addCommentBd($comment,$id_user,$id_actor);
        $url = "?page=actors::viewAnActor&id=$id_actor";
        header("Location: http://localhost/gbafExtranetCode".$url);
    }
}