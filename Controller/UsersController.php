<?php 

namespace Controller;

use Exception;

class UsersController extends ParentController
{
    private $usersManager;

    public function __construct(){
        $this->usersManager = new \Model\UsersManager();
        //$identifier = $this->usersManager->getId();
        //$identifier = $_POST['username'];
        //dump($identifier);
        /*$this->usersManager->callUsers();*/
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
            try{
                // on traite le formulaire de login
                //1-on récupère le username
                $username = $_POST['username'] ?? "";
                //2-on récupère les infos de l'user de la bdd
                $user = $this->usersManager->getUserByUsername($username);
                if(!$user){
                    throw new \Exception("username inconnu");
                }
                //3-si récupéré, on compare les password
                if($user->getPassword() !== $_POST['password'] ){
                    throw new \Exception("mauvais mot de passe");
                }
                //4-si OK, on créé le user en session $_session, on redirige sur viewActors, sinon page de login avec msg d'erreur                    
                $_SESSION["user"] = $user;
                $_SESSION["idUser"] = $user->getIdUser();
                $url = "?page=users::homeUser";
                $this->redirect($url);
            }catch(\Exception $e){
                $errorMessage = $e->getMessage();
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

    /*public function update()
    {
            $postData = $_POST;
            $user=$_SESSION["user"];

            if (isset($postData['question'])){
                $id_question = intval(substr($postData['question'],0,1));
            }else{
                $id_question= $user->getQuestion();
            }

            if (isset($postData['reponse'])){
                $reponse = $postData['reponse'];
            }else{
                $reponse= $user->getReponse();
            }

            if (isset($postData['password'])){
                $password = $postData['password'];
            }else{
                $password = $user->getPassword();
            }

            if (isset($postData['email'])){
                $email = $postData['email'];
            }else{
                $email = $user->getEmail();
            }
                    
            $users =[
            'username' => $username = $user->getUsername(),
            'idUser' => $idUser = $user->getIdUser(),
            'password' => $password,
            'id_question' => $id_question,
            'reponse' => $reponse,
            'email' => $email,
            ];
            //dump($users);
            $this->usersManager->updateUser();

            //$url = "?page=users::parameter";
            //$this->redirect($url);
            $_SESSION["user"] = $user;
            $_SESSION["idUser"] = $user->getIdUser();
            $url = "?page=users::homeUser";
            $this->redirect($url);
    }*/
    public function update()
    {
            try{
                // on traite le formulaire de login
                //1-on récupère le username
                $postData = $_POST;
                $user=$_SESSION["user"];
                $username = $user->getUsername() ?? "";
                //dump($_SESSION);
                //dump($username);
                //2-on récupère les infos de l'user de la bdd
                $user = $this->usersManager->getUserByUsername($username);
                if(!$user){
                    throw new \Exception("username inconnu");
                }
                //3-si récupéré, on compare les password
                /*if($user->getQuestion() !== $_POST['question'] ){
                    $id_question = intval(substr($_POST['question'],0,1));
                }
                if($user->getReponse() !== $_POST['reponse'] ){
                    $reponse = $_POST['reponse'];
                }
                if($user->getPassword() !== $_POST['password'] ){
                    $password = $_POST['password'];
                }
                if($user->getEmail() !== $_POST['email'] ){
                    $email = $_POST['email'];
                }*/
                if (isset($postData['question'])){
                    $id_question = intval(substr($postData['question'],0,1));
                }else{
                    $id_question= $user->getIdQuestion();
                }
        
                if (isset($postData['reponse'])){
                    $reponse = $postData['reponse'];
                }else{
                    $reponse= $user->getReponse();
                }
        
                if (isset($postData['password'])){
                    $password = $postData['password'];
                }else{
                    $password = $user->getPassword();
                }
        
                if (isset($postData['email'])){
                    $email = $postData['email'];
                }else{
                    $email = $user->getEmail();
                }
                //4-si OK, on créé le user en session $_session, on redirige sur viewActors, sinon page de login avec msg d'erreur                    
                $_SESSION["user"] = $user;
                $_SESSION["idUser"] = $user->getIdUser();
                $users =[
                    'username' => $username = $user->getUsername(),
                    'idUser' => $idUser = $user->getIdUser(),
                    'password' => $password,
                    'id_question' => $id_question,
                    'reponse' => $reponse,
                    'email' => $email,
                    ];
                   //dump($users);
                    $this->usersManager->updateUser();

                $url = "?page=users::update";
                $this->redirect($url);
            }catch(\Exception $e){
                $errorMessage = $e->getMessage();
            }   

    }
    

}