<?php

namespace Model;

require_once("Model/myPDO.php");
require_once("Model/User.php");

class UsersManager extends \myPDO{
    private $users;

    public function addUser($user){
        $this->users[] = $user;
    }

    public function getUsers(){
        return $this->users;
    }

    public function getId()
    {
        /*if(isset($_POST)){
            return $identifier = $_POST['username'];
        }else{
            return $identifier = $_SESSION['username'];
        }*/
        
        return $identifier = $_POST['username'];
    }

    public function callUsers(){
    //récupération des données de la table users
        if(isset($_POST)){
            $identifier = $_POST['username'];
        }
        
        $db = \myPDO::dbConnect();
        $stmt = $db->prepare("SELECT id_user,nom,prenom,username,question,password,reponse,email FROM `users` inner join `question`ON users.id_question=question.id_question WHERE username = :id");
        $stmt->execute(
            ['id' => $identifier,]
        );
        
        $users = $stmt->fetchAll();
        foreach ($users as $user){
            $u = new User($user['id_user'],$user['nom'],$user['prenom'],$user['username'],$user['password'],$user['question'],$user['reponse'],$user['email']);
            $this->addUser($u);
        }
    }

    public function getUserById($id){
        for($i=0; $i < count($this->users);$i++){
            if($this->users[$i]->getIduser() === $id){
                return $this->users[$i];
            }
        }
    }

    public function insertNewUser()
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

        $username = $postData['username'];
        $password = $postData['password'];
        $nom = $postData['nom'];
        $prénom = $postData['prénom'];
        $id_question = intval(substr($postData['question'],0,1));
        $réponse = $postData['réponse'];
        $email = $postData['email'];


        $db = \myPDO::dbConnect();
        $stmt = $db->prepare("INSERT INTO `users`(nom,prenom,username,password,id_question,reponse,email) VALUES (:nom, :prenom, :username, :password, :id_question, :reponse, :email )");
        $stmt->execute([
            'nom' => $nom,
            'prenom' => $prénom,
            'username' => $username,
            'password' => $password,
            'id_question' => $id_question,
            'reponse' => $réponse,
            'email' => $email,
            ]);

    }


    public function updateUser()
    {
        $postData = $_POST;

        $username = $_SESSION['username'];
        $idUser = $_SESSION['idUser'];

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


        $db = \myPDO::dbConnect();
        $stmt = $db->prepare("UPDATE `users` SET `password`=:password, `id_question`=:id_question ,`reponse`=:reponse ,`email`=:email ) WHERE `id_user`=:idUser");
        $stmt->execute([
            'idUser' => $idUser,
            'password' => $password,
            'id_question' => $id_question,
            'reponse' => $réponse,
            'email' => $email,
            ]);

    }
}