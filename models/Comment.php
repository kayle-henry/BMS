<?php
// models/Comment.php

class Comment {
    private $comID;
    private $content;
    private $authorID;
    private $artID;
    private $lastModified;

    public function getComID() { return $this->comID; }
    public function setComID($comID) { $this->comID = $comID; }

    public function getContent() { return $this->content; }
    public function setContent($content) { $this->content = $content; }

    public function getAuthorID() { return $this->authorID; }
    public function setAuthorID($authorID) { $this->authorID = $authorID; }

    public function getArtID() { return $this->artID; }
    public function setArtID($artID) { $this->artID = $artID; }

    public function getLastModified() { return $this->lastModified; }
    public function setLastModified($lastModified) { $this->lastModified = $lastModified; }
}
