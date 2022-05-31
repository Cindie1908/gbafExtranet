<?php
require('vendor/autoload.php');
?>

    <?php
    //routeur
    $page = $_GET['page'] ?? 'actors::viewActors';
    try{
        list($controllerName,$action) = explode("::",$page);
        $controllerName .= "Controller";
        $controllerName = ucfirst($controllerName);
        $controllerName = "Controller\\".$controllerName;
        if(class_exists($controllerName) && method_exists($controllerName,$action)){
            $controller = new $controllerName();
            $controller->$action();
        }else{
            throw new Exception("La page n'existe pas");
        }
    }
    catch(Exception $e){
        echo $e->getMessage();
    }