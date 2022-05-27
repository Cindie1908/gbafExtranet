<?php
// récupération et affichage des données Actor
class Actor{
    private $titre;
    private $description;
    private $logo;
    private $idActor;

    public static $actors = [];

    public function __construct($titre,$description,$logo,$idActor){
        $this->titre = $titre;
        $this->description= $description;
        $this->logo = $logo;
        $this->idActor = $idActor;
    }

    public function getActor(){
        return $this->idActor;
    }

    public function __toString(){
        $affichage = '<div class="vignette">';
        $affichage .= '<div>';
        $affichage .= '<img class="logo-vignette" src ='.$this->logo.' alt='.$this->logo.' />';
        $affichage .='</div>';
        $affichage .= '<div class="displayvignette">';
        $affichage .= $this->idActor . "- Votre partenaire " . $this->titre . "<br />";
        $affichage .= substr($this->description,0,120) . "...<br />";
        $affichage .= '<form action="#" method="GET">';
        /*$affichage .= '<input type="submit" name="idActor" id="idActor" value="'.$this->idActor.'">Lire la suite</a>'*/;
        $affichage .= '<a class="lirelasuite" href="?idActor='.$this->idActor.'">Lire la suite</a>';
        $affichage .='</form>';
        $affichage .='</div>';
        $affichage .='</div>';
        return $affichage;
    }

    public function viewAnActor($id){
        $actorById=$this->getActor($id);
    }
}


/*class Actor{
    private $titre;
    private $description;
    private $logo;

    public static $actors = [];

    public function __construct($titre,$description,$logo){
        $this->titre = $titre;
        $this->description= $description;
        $this->logo = $logo;
        //self::$actors[] = $this;
    }

    /*public function viewActor(){
        echo $this->id_actor;
    }*/

    /*public function getActor(){
        return $this->titre;
    }

    public function __toString(){
    ?>
        <div class="vignette">
            <div >
                <img class="logo-vignette" alt=<?php $this->logo; ?> src="<?php $this->logo; ?>")>
            </div>
            <div class="displayvignette">
            <p><?php  $this->titre; ?></p>
                <p><?php substr( $this->description,0,120); ?> ...</p>
                <button class="lirelasuite"  type="submit" class="btn btn-primary">Lire la suite</button>
            </div>
        </div>
    <?php
    }*/



    /*function setActor($titre){
        $this->titre=$titre;
    }*/

    /*public function getListOfActors(){
        return self::$actors;
    }
}*/

/*if (isset($_GET['id']) && $_GET['id'] > 0) {
    $actor = getActor($_GET['id']);
    $comments = getComments($_GET['id']);
    require("description.php");
}
else {
    echo 'Erreur : pas de commentaires';
}*/
