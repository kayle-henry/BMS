<?php
    class User{
        private $userID;
        private $username;
        private $lastname;
        private $firstname;
        private $email;
        private $passwd;
        private $role;

        public function load($row){
            $this->setUserID($row['userID']);
            $this->setUsername($row['username']);
            $this->setLastName($row['lastname']);
            $this->setFirstName($row['firstname']);
            $this->setEmail($row["email"]);
            $this->setPasswd($row["passwd"]);
            $this->setRole($row['role']);
        }

        public function setUserID($contactID){
            $this->contactID=$contactID;
        }

        public function getUserID(){
            return $this->contactID;
        }

        public function setUsername($username){
            $this->username=$username;
        }

        public function getUsername(){
            return $this->username;
        }
        public function setFirstName($firstname){
            $this->firstname=$firstname;
        }

        public function getFirstName(){
            return $this->firstname;
        }
        public function setLastName($lastname){
            $this->lastname=$lastname;
        }

        public function getLastName(){
            return $this->lastname;
        }

        public function setEmail($email){
            $this->email=$email;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setPasswd($passwd){
            $this->passwd=$passwd;
        }

        public function getPasswd(){
            return $this->passwd;
        }
        public function setRole($passwd){
            $this->role=$role;
        }

        public function getRole(){
            return $this->role;
        }
    }
?>
