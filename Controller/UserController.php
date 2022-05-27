<?php 

namespace Controller;

class UserController
{
    public function login()
    {
        $test = new \Model\Test();
        $content= realpath(__DIR__.'/../view/login.php');
        require __DIR__.'/../view/template.php';
    }
}