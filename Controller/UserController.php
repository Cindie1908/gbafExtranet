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

class CommentsModalController
{
    public function show()
    {
        $modal = new \Model\Modal();
        $content= realpath(__DIR__.'/../view/viewComments.php');
        require __DIR__.'/../view/template.php';
    }
}