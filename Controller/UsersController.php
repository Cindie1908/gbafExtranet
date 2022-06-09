<?php 

namespace Controller;

class UsersController extends ParentController
{
    private $usersManager;

    public function __construct(){
        $this->usersManager = new \Model\UsersManager();
        //$identifier = $this->usersManager->getId();
        //$identifier = $_POST['username'];
        //dump($identifier);
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


    public function login()
    {
        if($this->isPost())
        {
            //$this->fakeLogin();
            // on traite le formulaire de login
            //1-on récupère le username
            //dump($_POST['username']);
            $identifier = $this->usersManager->getId();
            //2-on récupère les infos de l'user de la bdd
            $users = $this->usersManager->getUsers();
            //dump($identifier);
            //3-si récupéré, on compare les password
            for($i=0; $i < count($users);$i++){
                if($users[$i]->getUsername() === $_POST['username'] &&
                $users[$i]->getPassword() === $_POST['password'] ){
            //4-si OK, on créé le user en session $_session, on redirige sur viewActors, sinon page de login avec msg d'erreur                    
                    $loggedUser = [
                        'username' => $users[$i]->getUsername(),
                        'nom'=> $users[$i]->getNom(),
                        'prénom'=> $users[$i]->getPrénom(),
                    ];
                    //dump($loggedUser);
                    $_SESSION["user"] = $users[$i];
                    $_SESSION["nom"] = $users[$i]->getNom();
                    $_SESSION["prénom"] = $users[$i]->getPrénom();
                    $_SESSION["username"] = $users[$i]->getUsername();
                    $_SESSION["password"] = $users[$i]->getPassword();
                    $_SESSION["email"] = $users[$i]->getEmail();
                    $_SESSION["question"] = $users[$i]->getQuestion();
                    $_SESSION["réponse"] = $users[$i]->getRéponse();
                    //dump($_SESSION);
                    //dump($_SESSION["réponse"]);
                    //dump($_SESSION["email"]);
                    //$url = "?page=actors::viewActors";
                    $url = "?page=users::homeUser";
                    $this->redirect($url);
                }
            }

            
        }
        require "view/login.php";
    }

    public function homeUser(){
        require "view/homeUser.php";
    }

    public function inscription(){
        require "view/inscription.php";
    }

    public function deconnect()
    {
        session_destroy();
        //dump($_SESSION);
        $url = "?page=users::login";
        $this->redirect($url);
    }

    public function parameter(){
        require "view/parameter.php";
    }

    public function modifyPassword(){
        require "view/modifyPassword.php";
    }

    public function getNewPassword(){
        require "view/getNewPassword.php";
    }

    public function invite(){
        require "view/inviteUsername.php";
    }


    /*public function creation()
    {
        if($this->isPost())
        {
            // on traite le formulaire de login
            //1-on récupère le username
            //dump($_POST['username']);
            $postData = $_POST;

            if (
                !isset($postData['username']) &&
                !isset($postData['password']) &&
                !isset($postData['nom']) &&
                !isset($postData['prénom']) &&
                !isset($postData['question']) &&
                !isset($postData['réponse']) &&
                !isset($postData['email'])
                )
            {
                echo('tous les champs sont requis');
                return;
            }
            $users =[
            'username' => $username = $postData['username'],
            'password' => $password = $postData['password'],
            'nom' => $nom = $postData['nom'],
            'prénom' => $prénom = $postData['prénom'],
            'id_question' => $id_question = intval(substr($postData['question'],0,1)),
            'réponse' => $réponse = $postData['réponse'],
            'email' => $email = $postData['email'],
            ];
            dump($users);
            //2-on récupère les infos de l'user de la bdd
            $this->usersManager->insertNewUser();
            
            $users = $this->usersManager->getUsers();
            dd($users);
            //dump($users);
            //3-si récupéré, on compare les password
            for($i=0; $i < count($users);$i++){
                if($users[$i]->getUsername() === $_POST['username'] &&
                $users[$i]->getPassword() === $_POST['password'] ){
            //4-si OK, on créé le user en session $_session, on redirige sur viewActors, sinon page de login avec msg d'erreur                    
                    $loggedUser = [
                        'username' => $users[$i]->getUsername(),
                        'nom'=> $users[$i]->getNom(),
                        'prénom'=> $users[$i]->getPrénom(),
                    ];
                    dump($loggedUser);
                    $_SESSION["user"] = $users[$i];
                    dump($_SESSION);
                    //$url = "?page=actors::viewActors";
                    //$url = "?page=users::homeUser";
                    //$this->redirect($url);
                }
            }

            
        }
        require "view/login.php";
    }   */ 

}