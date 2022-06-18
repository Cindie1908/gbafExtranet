<?php
namespace Model;


class User{
    private $id_user;
    private $nom;
    private $prenom;
    private $username;
    private $password;
    private $question;
    private $id_question;
    private $reponse;
    private $email;

    public function __construct($id_user,$nom,$prenom,$username,$password,$question,$id_question,$reponse,$email){
        $this->id_user = $id_user;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->username = $username;
        $this->password = $password;
        $this->question = $question;
        $this->id_question = $id_question;
        $this->reponse = $reponse;
        $this->email = $email;
    }


    public function getIdUser(){return $this->id_user;}
    public function setIdUser($id_user){$this->id_user = $id_user;}

    public function getNom(){return $this->nom;}
    public function setNom($nom){$this->nom = $nom;}

    public function getPrenom(){return $this->prenom;}
    public function setPrenom($prenom){$this->prenom = $prenom;}

    public function getUsername(){return $this->username;}
    public function setUsername($username){$this->username = $username;}

    public function getPassword(){return $this->password;}
    public function setPassword($password){$this->password = $password;}

    public function getQuestion(){return $this->question;}
    public function setQuestion($question){$this->question = $question;}

    public function getIdQuestion(){return $this->id_question;}
    public function setIdQuestion($id_question){$this->id_question = $id_question;}

    public function getReponse(){return $this->reponse;}
    public function setReponse($reponse){$this->reponse = $reponse;}

    public function getEmail(){return $this->email;}
    public function setEmail($email){$this->email = $email;}
}