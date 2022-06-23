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
        $sumLikes = $this->SumLikesManager->getSumLikes();
        $comments = $this->CommentsManager->getComments();
        $user = $this->getUser();
        $sumLike = $sumLikes[$id];
        $comment = $comments[$id];
        require "view/viewActor.php";
    }
}