<?php

namespace Model;

require_once("Model/myPDO.php");
//require_once("Model/User.php");

class UsersManager extends \myPDO{
    private $users;

    public function addUser($user){
        $this->users[] = $user;
    }

    public function getUsers(){
        return $this->users;
    }

    public function getUserByUsername(string $username): ?User
    {
    //récupération des données de la table users
        $db = \myPDO::dbConnect();
        $stmt = $db->prepare("SELECT id_user,nom,prenom,username,question,password,reponse,email,users.id_question AS id_question FROM `users` inner join `question`ON users.id_question=question.id_question WHERE username = :username LIMIT 1");
        $stmt->execute(
            ['username' => $username,]
        );
        
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);
        if($user === false){
            return null;
        }
        return new User($user['id_user'],$user['nom'],$user['prenom'],$user['username'],$user['password'],$user['question'],$user['id_question'],$user['reponse'],$user['email']);
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
        $password = password_hash($postData['password'],PASSWORD_DEFAULT);
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
        $user=$_SESSION["user"];

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

        $idUser = $user->getIdUser();
        
        $db = \myPDO::dbConnect();
        $stmt = $db->prepare("UPDATE `users` SET `password`=:password, `id_question`=:id_question ,`reponse`=:reponse ,`email`=:email WHERE `id_user`=:idUser");
        $stmt->execute([
            'idUser' => $idUser,
            'password' => $password,
            'id_question' => $id_question,
            'reponse' => $reponse,
            'email' => $email,
            ]);
    }
    public function getUsername(){
    //récupération des usernames de la table users
        $db = \myPDO::dbConnect();
        $stmt = $db->prepare("SELECT username FROM `users`");
        $stmt->execute();
        $usernames = $stmt->fetchAll();
        dd($usernames);
        //foreach ($users as $user){
            //$username = new User($user['username']);
        //}
        
    }

}