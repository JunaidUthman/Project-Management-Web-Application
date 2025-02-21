<?php
    class user{
        private $id;
        private $nom;
        private $email;
        private $password;
        private $role;

        public function __construct($email,$password,$id=NULL,$nom=NULL,$role=NULL){
            $this->id=$id;
            $this->nom=$nom;
            $this->email=$email;
            $this->password=$password;
            $this->role=$role;
        }

        public function getid(){
            return $this->id;
        }

        public function getnom(){
            return $this->nom;
        }
        public function getemail(){
            return $this->email;
        }
        public function getpassword(){
            return $this->password;
        }
        public function getrole(){
            return $this->role;
        }

    }
?>