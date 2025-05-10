<?php
// models/Topic.php

class Topic {
    private $topID;
    private $name;
    private $description;

    public function getTopID() { return $this->topID; }
    public function setTopID($topID) { $this->topID = $topID; }

    public function getName() { return $this->name; }
    public function setName($name) { $this->name = $name; }

    public function getDescription() { return $this->description; }
    public function setDescription($description) { $this->description = $description; }
