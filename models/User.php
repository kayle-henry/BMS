<?php
// models/User.php

class User {
    private $userID;
    private $username;
    private $lastname;
    private $firstname;
    private $password;
    private $email;
    private $role;
    private $lastModified;

    public function getUserID() { return $this->userID; }
    public function setUserID($userID) { $this->userID = $userID; }

    public function getUsername() { return $this->username; }
    public function setUsername($username) { $this->username = $username; }

    public function getLastname() { return $this->lastname; }
    public function setLastname($lastname) { $this->lastname = $lastname; }

    public function getFirstname() { return $this->firstname; }
    public function setFirstname($firstname) { $this->firstname = $firstname; }

    public function getPassword() { return $this->password; }
    public function setPassword($password) { $this->password = $password; }

    public function getEmail() { return $this->email; }
    public function setEmail($email) { $this->email = $email; }

    public function getRole() { return $this->role; }
    public function setRole($role) { $this->role = $role; }

    public function getLastModified() { return $this->lastModified; }
    public function setLastModified($lastModified) { $this->lastModified = $lastModified; }
}
?>
