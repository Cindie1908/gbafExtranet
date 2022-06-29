<?php

namespace Controller;


class ActorsController extends ParentController
{
    private $actorsManager;

    public function __construct()
    {
        if (!$this->isAuthenticated()){
            $this->redirect("/?page=users::login");
        }
        $this->actorsManager = new \Model\ActorsManager();
        $this->actorsManager->callActors();
        $this->SumLikesManager = new \Model\SumLikesManager();
        $this->CommentsManager = new \Model\CommentsManager();
        $this->usersManager = new \Model\UsersManager();
    }

    public function viewActors()
    {
        $actors = $this->actorsManager->getActors();
        require "view/viewListOfActors.php";
    }

    public function viewAnActor()
    {
        $id = $_GET['id'];
        $actorById = $this->actorsManager->getActorById($id);
        $sumLikes = $this->SumLikesManager->getSumLikeById($id);
        if($sumLikes===null){
            $sumLikes =
            [
                /*'sumLike' => 0,
                'dislikeSum' => 0,
                'idActor' => $id,*/
            ];
            //dump($sumLike);
        }
        {
            $sumLikes = $this->SumLikesManager->getSumLikes();
        }
            
        
        //$comments = $this->CommentsManager->getCommentsById($id);
        $comments = $this->CommentsManager->getCommentsByActor($id);
        //dump($comments);
        if($comments===null){
            $comments =
            [
                /*'commentDate' => "",
                'commentText' => "",
                'idUser' => "",
                'idActor' => "",
                'idComment' => "",
                'name' => "",
                'firstname' => "",*/
            ];
        
        //dump($comment);
        }else
        {
            $comments = $this->CommentsManager->getComments();
            //$comment = $comments[$id];
            //dump($comment);
        }
        $user = $this->getUser();
        //$sumLike = $sumLikes[$id];
        
        require "view/viewActor.php";
    }
}