<?php
require('vendor/autoload.php');
//include_once('controller/controller.php');
//include_once('model/query.php');
?>


<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>GBAF Extranet</title>
        <link rel="stylesheet" href="public/styles.css" type="text/css" >
    </head>


    <?php
    //routeur
    /*$page = $_GET["page"] ?? null;
    //si la fonction actor existe, faire actor()
    if(function_exists($page)){
        $page();
    }*/

    if(empty($_GET['page'])){
        require "view/login.php";
    }else{        
        switch($_GET['page']){
            case "actors": require 'view/viewListOfActors.php';
            break;
            case "actors?idActor=":require 'view/viewActor.php';
            break;
        }
    }
    ?>
        <!-- Navigation -->
        <?php /*include_once('view/login.php'); ?>

        <?php if(isset($loggedUser)): ?>                

            <!-- Navigation -->
            <?php include_once('view/header.php'); ?>
            <?php /*include_once('view/viewUser.php'); ?>

            <!-- Entête -->
            <?php include_once('view/title.php'); ?>

            <!-- Liste -->
            <?php include_once('view/vignette.php'); ?>

            <?php /*include_once('view/postComment.php'); ?>
            <?php include_once('view/description.php'); ?> 
            <!-- pied -->
            <?php include_once('view/footer.php'); ?>

        <?/*php endif; */?>