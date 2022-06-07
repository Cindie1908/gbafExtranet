<?php 

namespace Controller;

class UsersController{
    private $usersManager;

    public function __construct(){
        $this->usersManager = new \Model\UsersManager();
        $this->usersManager->callUsers();
    }

    public function viewUsers()
    {
        $users = $this->usersManager->getUsers();
        require "view/login.php";
    }

    public function viewAnUser(){
        $id = $_GET['id'];
        $userById = $this->usersManager->getuserById($id);
        require "view/login.php";
    }


    /*public function login()
    {
        $test = new \Model\Test();
        $content= realpath(__DIR__.'/../view/login.php');
        require __DIR__.'/../view/template.php';
    }*/
    
    /*public function connexion(){
        $users = $this->usersManager->getUsers();
        if (isset($_POST['username']) &&  isset($_POST['password'])) {
            foreach ($users as $user) {
                if (
                    $user->getUsername() === $_POST['username'] &&
                    $user->getPassword() === $_POST['password']
                ) {
                    $loggedUser = [
                        'username' => $user['username'],
                        'nom'=>$user['nom'],
                        'prénom'=>$user['prénom'],
                    ];
                    require "view/viewUser.php";
                } else {
                    $errorMessage = sprintf('Erreur identifiée : (%s/%s)',
                        $_POST['username'],
                        $_POST['password']
                    );
                }
            }
        }
    }*/

}
