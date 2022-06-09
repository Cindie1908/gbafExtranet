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

    public function callLikes(){
    //récupération des données de la table actors
        $db = \myPDO::dbConnect();
        $stmt = $db->prepare("SELECT * FROM `like`");
        $stmt->execute();
        $likes = $stmt->fetchAll();
        foreach ($likes as $like){
            $l = new Like($like['id-like'],$like['Like'],$like['Dislike'],$like['id_user'],$like['id_actor']);
            $this->addLike($l);
        }
    }

    public function getLikeById($id){
        for($i=0; $i < count($this->likes);$i++){
            if($this->likes[$i]->getIdActor() === $id){
                return $this->likes[$i];
            }
        }
    }

    public function addLikeBd($likeNb,$dislikeNb,$id_user,$id_actor){
        $db = \myPDO::dbConnect();
        $stmt = $db->prepare("INSERT INTO 'like' (Like, Dislike, id_user, id_actor) values (?, ?, ?, ?");
        $result = $stmt->execute($likeNb,$dislikeNb,$id_user,$id_actor);
        return ($result > 0);
    }
}
