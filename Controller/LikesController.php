<?php

namespace Controller;

use Exception;

class LikesController extends ParentController
{
    private $likesManager;

    public function __construct(){
        $this->likesManager = new \Model\LikesManager();
    }

    public function postLikeForAnActor(){
        //on récupére le idUser et l'idActor
        $user = $this->getUser();
        $id_actor = $_GET['id'];
        $id_user= $user->getIdUser();
        $likeNb = 1;
        $dislikeNb = 0;
        //on récupére les infos like par user et acteur de la bdd
        $like = $this->likesManager->getLikeByUser($user->getIdUser(),$id_actor);
        //on vérifie si boutons like ou dislike activés 
        if($like !== null){
        //si l'un des 2 activé > on ne fait rien
            throw new \Exception("vous avez déjà évalué ce partenaire");
        }        
        // sinon pour liker, on post 1 pour like et 0 pour dislike
        $likes = [
            'id_user' => $id_user,
            'id_actor' => $id_actor,
            'likeNb' => $likeNb,
            'dislikeNb' => $dislikeNb,
        ];
        //dump($likes);
        $this->likesManager->addLikeBd($likeNb,$dislikeNb,$id_user,$id_actor);
        $url = "?page=actors::viewAnActor&id=$id_actor";
                $this->redirect($url);
    }

    public function postDislikeForAnActor(){
        //on récupére le idUser et l'idActor
        $user = $this->getUser();
        $id_actor = $_GET['id'];
        $id_user= $user->getIdUser();
        $likeNb = 0;
        $dislikeNb = 1;
         //on récupére les infos like par user et acteur de la bdd
        $like = $this->likesManager->getLikeByUser($user->getIdUser(),$id_actor);
       
        //on vérifie si boutons like ou dislike activés 
        if($like !== null){
        //si l'un des 2 activé > on ne fait rien
            throw new \Exception("vous avez déjà évalué ce partenaire");
        }        
        //pour disliker, on post 0 pour like et 1 pour dislike
        $dislikes = [
            'id_user' => $id_user,
            'id_actor' => $id_actor,
            'likeNb' => $likeNb,
            'dislikeNb' => $dislikeNb,
        ];
        //dump($likes);
        $this->likesManager->addDislikeBd($likeNb,$dislikeNb,$id_user,$id_actor);
        $url = "?page=actors::viewAnActor&id=$id_actor";
                $this->redirect($url);
    }
}