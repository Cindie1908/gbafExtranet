<?php
namespace Model;


class User{
    private $id_user;
    private $nom;
    private $prénom;
    private $username;
    private $password;
    private $question;
    private $réponse;
    private $email;

    public function __construct($id_user,$nom,$prénom,$username,$password,$question,$réponse,$email){
        $this->id_user = $id_user;
        $this->nom = $nom;
        $this->prénom = $prénom;
        $this->username = $username;
        $this->password = $password;
        $this->question = $question;
        $this->réponse = $réponse;
        $this->email = $email;
    }


    public function getIdUser(){return $this->id_user;}
    public function setIdUser($id_user){$this->id_user = $id_user;}

    public function getNom(){return $this->nom;}
    public function setNom($nom){$this->nom = $nom;}

    public function getPrénom(){return $this->prénom;}
    public function setPrénom($prénom){$this->prénom = $prénom;}

    public function getUsername(){return $this->username;}
    public function setUsername($username){$this->username = $username;}

    public function getPassword(){return $this->password;}
    public function setPassword($password){$this->password = $password;}

    public function getQuestion(){return $this->question;}
    public function setQuestion($question){$this->question = $question;}

    public function getRéponse(){return $this->réponse;}
    public function setRéponse($réponse){$this->réponse = $réponse;}

    public function getEmail(){return $this->email;}
    public function setEmail($email){$this->email = $email;}
}