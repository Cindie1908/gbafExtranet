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

    public function callUsers(){
    //récupération des données de la table actors
        $db = \myPDO::dbConnect();
        $stmt = $db->prepare("SELECT id_user,nom,prénom,username,question,password,réponse,email FROM `users` inner join `question`ON users.id_question=question.id_question");
        $stmt->execute();
        $users = $stmt->fetchAll();
        foreach ($users as $user){
            $u = new User($user['id_user'],$user['nom'],$user['prénom'],$user['username'],$user['question'],$user['password'],$user['réponse'],$user['email']);
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
}