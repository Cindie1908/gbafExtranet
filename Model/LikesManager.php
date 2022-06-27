<?php

namespace Model;

require_once("Model/myPDO.php");
require_once("Model/Like.php");

class LikesManager extends \myPDO{
    private $likes;

    public function addLike($like){
        $this->likes[] = $like;
    }

    public function getLikes(){
        return $this->likes;
    }

    public function getLikeByUser($id_user,$id_actor)
    {
    //récupération des données de la table like
        $db = \myPDO::dbConnect();
        $stmt = $db->prepare("SELECT * FROM `like` WHERE id_user = :idUser AND id_actor = :idActor");
        $stmt->execute([
            'idUser' => $id_user,
            'idActor' => $id_actor,   
        ]);
        $like = $stmt->fetch(\PDO::FETCH_ASSOC);
        if($like=== false){
            return null;
        }
        return new Like($like['id-like'],$like['likenb'],$like['dislikenb'],$like['id_user'],$like['id_actor']);
    }

    public function getLikeById($id){
        for($i=0; $i < count($this->likes);$i++){
            if($this->likes[$i]->getIdActor() === $id){
                return $this->likes[$i];
            }
        }
    }

    public function addLikeBd($likeNb,$dislikeNb,$id_user,$id_actor){
        $user=$_SESSION["user"];
        $id_user= $user->getIdUser();
        $id_actor = $_GET['id'];
        $likeNb = intval(1);
        $dislikeNb = intval(0);
        $db = \myPDO::dbConnect();
        $stmt = $db->prepare("INSERT INTO `like` (likenb, dislikenb, id_user, id_actor) values (:likenb, :dislikenb, :id_user, :id_actor)");
        $result = $stmt->execute([
            'likenb' => $likeNb,
            'dislikenb' => $dislikeNb,
            'id_user' => $id_user,
            'id_actor' => $id_actor
        ]);
        return ($result > 0);
    }

    public function addDislikeBd($likeNb,$dislikeNb,$id_user,$id_actor){
        $user=$_SESSION["user"];
        $id_user= $user->getIdUser();
        $id_actor = $_GET['id'];
        $likeNb = intval(0);
        $dislikeNb = intval(1);
        $db = \myPDO::dbConnect();
        $stmt = $db->prepare("INSERT INTO `like` (likenb, dislikenb, id_user, id_actor) values (:likenb, :dislikenb, :id_user, :id_actor)");
        $result = $stmt->execute([
            'likenb' => $likeNb,
            'dislikenb' => $dislikeNb,
            'id_user' => $id_user,
            'id_actor' => $id_actor
        ]);
        return ($result > 0);
    }
}

