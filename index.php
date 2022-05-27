<?php
require('vendor/autoload.php');
$userController = new Controller\UserController();
define("URL", str_replace('index.php',"",(isset($_SERVER['HTTPS'])?"https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
$isConnected=false;
require_once "Controller/ActorsController.php";
    $ActorController = new ActorsController;
//require_once "Controller/CommentsController.php";
    //$CommentController = new CommentsController;
?>

    <?php
    //routeur
    try{
        if(empty($_GET['page'])/*||(!$isConnected)*/){
            /*$userController->login();*/
            echo "il faudra se logguer";
        }else{
            $url = explode("/",filter_var($_GET['page']),FILTER_SANITIZE_URL);  
            echo"<pre>";
            print_r($url);
            echo"</pre>";
            switch($url[0]){
                case "actors" : $ActorController->viewActors();
                break;
                case "actor";
                    if(empty($url[1])){
                        $ActorController->viewActors();
                    }else if ($url[1]==="view"){
                        echo $ActorController->viewAnActor($url[2]);
                    }else if ($url[1]==="viewcomments"){
                        //echo $CommentController->viewComments();
                        echo"voir les commentaires pour un acteur";
                    }else if ($url[1]==="modify"){
                        echo"modifier un acteur";
                    }else{
                        throw new Exception("La page n'existe pas");
                    }
                break;
                default : throw new Exception("La page n'existe pas");
            }
        }
    }
    catch(Exception $e){
        echo $e->getMessage();
    }