<?php

namespace Model;

require_once("Model/myPDO.php");
require_once("Model/SumLike.php");

class SumLikesManager extends \myPDO{
    private $sumLikes = [];

    public function addSumLike($sumLike){
        $this->sumLikes[$sumLike->getidActor()] = $sumLike;
    }

    public function getSumLikes(){
        if(count($this->sumLikes) === 0)
        {
            $this->callSumLikes();
        }
        return $this->sumLikes;
    }


    public function callSumLikes(){
        //récupération des données de la table actors
            $db = \myPDO::dbConnect();
            $stmt = $db->prepare("SELECT SUM( `like`) AS totalLike, SUM(`Dislike`) AS totalDislike,  `id_actor`from `like` GROUP BY `id_actor`");
            $stmt->execute();
            $sumLikes = $stmt->fetchAll();
            foreach ($sumLikes as $sumLike){
                $l = new SumLike($sumLike['totalLike'],$sumLike['totalDislike'],$sumLike['id_actor']);
                $this->addSumLike($l);
            }
        }

    public function getSumLikeById($id){
        for($i=0; $i < count($this->sumLikes);$i++){
            if($this->sumLikes[$i]->getIdActor() === $id){
                return $this->sumLikes[$i];
            }
        }
    }
}

