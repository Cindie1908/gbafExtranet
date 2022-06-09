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
        return $identifier = $_POST['username'];
    }

    public function callUsers(){
    //récupération des données de la table users
        if(isset($_POST)){
            $identifier = $_POST['username'];
        }
        
        $db = \myPDO::dbConnect();
        $stmt = $db->prepare("SELECT id_user,nom,prénom,username,question,password,réponse,email FROM `users` inner join `question`ON users.id_question=question.id_question WHERE username = :id");
        $stmt->execute(
            ['id' => $identifier,]
        );
        
        $users = $stmt->fetchAll();
        foreach ($users as $user){
            $u = new User($user['id_user'],$user['nom'],$user['prénom'],$user['username'],$user['password'],$user['question'],$user['réponse'],$user['email']);
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
        $stmt = $db->prepare("INSERT INTO `users`(nom,prénom,username,password,id_question,réponse,email) VALUES (:nom, :prénom, :username, :password, :id_question, :réponse, :email )");
        $stmt->execute([
            'nom' => $nom,
            'prénom' => $prénom,
            'username' => $username,
            'password' => $password,
            'id_question' => $id_question,
            'réponse' => $réponse,
            'email' => $email,
            ]);

    }
}