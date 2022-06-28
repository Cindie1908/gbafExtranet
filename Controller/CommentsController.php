<?php

namespace Controller;


class CommentsController extends ParentController
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
            $user = $this->getUser();
            $id_actor = $_GET['id'];
            $id_user= $user->getIdUser();
        $comment = $this->commentsManager->getCommentByUser($user->getIdUser(),$id_actor);
        if($comment !== null){
            //si l'un des 2 activé > on ne fait rien
                throw new \Exception("vous avez déjà posté un commentaire pour ce partenaire");
            }  
        $comments =[
            'comment' => $comment = $_POST['commentmsg'],
            'id_user' => $id_user,
            'id_actor' => $id_actor,
        ];
        $this->commentsManager->addCommentBd($comment,$id_user,$id_actor);
        $url = "?page=actors::viewAnActor&id=$id_actor";
        header("Location: http://localhost/gbafExtranetCode".$url);
    }
}