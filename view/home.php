<?php
require "login.php";
//require('Model/query.php');
//echo $test->connect();
$users = getDatas();

if (/*$isconnected === "true" && */isset($_POST['username']) &&  isset($_POST['password'])) {
   
//$users = getDatas();
        foreach ($users as $user) {
            if ($user['username'] === $_POST['username'] && $user['password'] === $_POST['password']) {
                /*session_start();
                $_SESSION[""] = "";*/
                //routeur
                //dump($user);
                echo $user['username'];
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
                    $msg = $e->getMessage();
                    //require "C:\MAMP\htdocs\gbafExtranetCode\view\viewError.php";
                }
            }
        }
}


