<?php 

namespace Controller;

// une classe abstraite ne peut pas être instanciée, seules ses classes filles peuvent l'être
abstract class ParentController
{
    public function isAuthenticated(): bool 
    {
        $user = $_SESSION["user"] ?? null;
        return $user !== null;
    }

    public function redirect($url)
    {
        header("Location: http://localhost/gbafExtranetCode".$url);
        die;
    }

    public function isPost()
    {
        $method = $_SERVER["REQUEST_METHOD"];
        return $method === "POST";
    }


    public function getUser()
    {
        if(!$this->isAuthenticated()){
            return null;
        }
        return $_SESSION["user"];
    }
}