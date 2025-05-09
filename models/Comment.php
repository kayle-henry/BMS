<?php
    class Comment{
        private $comID;
        private $authorID;
        private $artID;
        private $content;

        public function load($row){
            $this->setContactID($row['contactID']);
            $this->setUsername($row['username']);
            $this->setEmail($row["email"]);
            $this->setPasswd($row["passwd"]);
        }

        public function setComID($comID){
            $this->comID=$comID;
        }

        public function getComID(){
            return $this->comID;
        }

        public function setAuthorID($authorID){
            $this->authorID=$authorID;
        }

        public function getAuthorID(){
            return $this->authorID;
        }

        public function setArtID($artID){
            $this->artID=$artID;
        }

        public function getArtID(){
            return $this->artID;
        }

        public function setContent($content){
            $this->content=$content;
        }

        public function getContent(){
            return $this->content;
        }
    }
?>
