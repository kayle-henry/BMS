<?php
    class Topic{
        private $topID;
        private $name;
        private $description;

        public function load($row){
            $this->setTopID($row['TopID']);
            $this->setName($row['name']);
            $this->setDescription($row["description"]);
        }

        public function setTopID($topID){
            $this->contactID=$contactID;
        }

        public function getTopID(){
            return $this->topID;
        }

        public function setName($name){
            $this->name=$name;
        }

        public function getName(){
            return $this->name;
        }

        public function setDescription($description){
            $this->description=$description;
        }

        public function getDescription(){
            return $this->description;
        }
    }
?>
