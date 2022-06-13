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
                    $_SESSION["idUser"] = $users[$i]->getIdUser();
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
    public function inviteUsername(){
        require "view/inviteUsername.php";
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
        //1-on récupère le username et la question
        dump($_SESSION['username']);
        dump($_SESSION['question']);
        $identifier = $this->usersManager->getId();
        dump($identifier);
        //2-on récupère les infos de l'user de la bdd
        $users = $this->usersManager->getUsers();
        dump($users);
        //3-si récupéré, on compare les réponses
        for($i=0; $i < count($users);$i++){
            if($users[$i]->getRéponse() === $_POST['réponse'])
            {
        //4-si OK, on créé le user en session $_session, on redirige sur modifyPassword, sinon page de login avec msg d'erreur                    
                $_SESSION["username"] = $users[$i]->getUsername();
                $_SESSION["question"] = $users[$i]->getQuestion();
                $_SESSION["réponse"] = $users[$i]->getRéponse();
                //dump($_SESSION);
                $url = "?page=users::ModifyPassword";
                $this->redirect($url);
            }
        }
    }


    public function invite(){
        //require "view/inviteUsername.php";
        if($this->isPost())
        {
            //1-on récupère le username
            //dump($_POST['username']);
            //2-on récupère les infos de l'user de la bdd
            $users = $this->usersManager->getUsers();
            //3-si récupéré, on compare les username
            for($i=0; $i < count($users);$i++){
                if($users[$i]->getUsername() === $_POST['username'])
                {
            //4-si OK, on créé le user en session $_session, on redirige sur modifyPassword, sinon page de login avec msg d'erreur                    
                    $_POST["username"] = $users[$i]->getUsername();
                    $_SESSION["username"] = $users[$i]->getUsername();
                    $_SESSION["question"] = $users[$i]->getQuestion();
                    $_SESSION["réponse"] = $users[$i]->getRéponse();
                    //dump($_SESSION);


                    $url = "?page=users::getNewPassword";
                    $this->redirect($url);
                }
            }

            
        }
        require "view/getNewPassword.php";
    }


    public function creation()
    {
        if($this->isPost())
        {
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

            $this->usersManager->insertNewUser();

            $url = "?page=users::login";
            $this->redirect($url);
        }
    }

    public function update()
    {
        if($this->isPost())
        {
            $postData = $_POST;

            if (isset($postData['question'])){
                $id_question = intval(substr($postData['question'],0,1));
            }else{
                $id_question = $_SESSION["question"];
            }

            if (isset($postData['réponse'])){
                $réponse = $postData['réponse'];
            }else{
                $réponse = $_SESSION["réponse"];
            }

            if (isset($postData['password'])){
                $password = $postData['password'];
            }else{
                $password = $_SESSION['password'];
            }

            if (isset($postData['email'])){
                $email = $postData['email'];
            }else{
                $email = $_SESSION["email"];
            }
                    dump($_SESSION["idUser"]);
            $users =[
            'username' => $username = $_SESSION["username"],
            'idUser' => $idUser = $_SESSION["idUser"],
            'password' => $password,
            'id_question' => $id_question,
            'réponse' => $réponse,
            'email' => $email,
            ];

            $this->usersManager->updateUser();

            $url = "?page=users::homeUser";
            $this->redirect($url);
        }
    }
            
}